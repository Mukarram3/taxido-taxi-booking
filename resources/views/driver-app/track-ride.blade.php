@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">
    <style>
        #map { height: 70vh; width: 100%; }
        .controls { margin: 10px; }
        .controls input { margin: 5px 0; width: 100%; padding: 8px; font-size: 14px; }
    </style>

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                    <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                </a>
                <h3>Track Ride</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <div class="controls">
        <input id="origin" type="text" placeholder="Pickup location" readonly>
        <div id="stops"></div>
        <input id="destination" type="text" placeholder="Final destination" readonly>
    </div>

    <div id="instruction-alert" class="alert alert-info" role="alert" style="display:none; position: fixed; top: 70px; width: 90%; max-width: 600px; left: 50%; transform: translateX(-50%); z-index: 1000;"></div>

    <div>
        <div id="eta-info" class="mb-2 fw-bold">ETA: - | Distance left: -</div>
    </div>

    <button onclick="redirectToGoogleMaps()" class="btn btn-primary w-100 mt-3">Start Navigation</button>

    @if ($track_ride)
    <!-- track ride starts -->
    <section>
        <div class="custom-container" id="map">

        </div>
    </section>
    <!-- track ride end -->
    @else
        <div style="padding: 20px; text-align: center;">
            <h3>No Active Ride Found</h3>
            <p>You currently do not have any scheduled or active rides to track.</p>
        </div>
    @endif

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    @include('driver-app.partials.bottom-navbar')
    <!-- bottom navbar end -->

    <!-- sidebar starts -->
    @include('driver-app.partials.sidebar')
    <!-- sidebar end -->

@endsection
@section('script')

    <!-- jQuery & Google Maps -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>

    <script>
        let map, directionsService, directionsRenderer;
        let stopInputs = [], allLegs = [], allSteps = [], currentStep = 0;

        let pickupLocation = {!! json_encode($track_ride['pickup_location'] ?? '') !!};
        let destinationArray = {!! json_encode(json_decode($track_ride['destination_location'] ?? '[]')) !!};
        let rideMessage = {!! json_encode($track_ride['message'] ?? '') !!};

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: { lat: 30.1575, lng: 71.5249 }
            });

            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer({ map: map });

            if (rideMessage === 'On the way to pickup' || rideMessage ==='User Requested to Return the Package' || rideMessage ==='Carrier Cancelled Ride' || rideMessage ==="Package return in progress") {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        pickupLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        destinationArray = [ {!! json_encode($track_ride['pickup_location'] ?? '') !!} ];
                        setupMap();
                    }, function () {
                        alert("Geolocation failed. Using default pickup location.");
                        setupMap();
                    });
                } else {
                    alert("Geolocation not supported by this browser.");
                    setupMap();
                }
            }
            else {
                setupMap();
            }

            function setupMap() {
                const origin = typeof pickupLocation === 'string'
                    ? pickupLocation
                    : new google.maps.LatLng(pickupLocation.lat, pickupLocation.lng);

                const destination = destinationArray[destinationArray.length - 1] ?? '';

                $('#origin').val(typeof origin === 'string' ? origin : `${origin.lat()}, ${origin.lng()}`);
                $('#destination').val(destination);

                for (let i = 0; i < destinationArray.length - 1; i++) {
                    const inputId = `stop-${i}`;
                    $('#stops').append(`<input id="${inputId}" type="text" value="${destinationArray[i]}" placeholder="Enter stop location">`);
                    stopInputs.push(inputId);
                }

                calculateRoute();
            }
        }

        function calculateRoute() {
            const origin = $('#origin').val();
            const destination = $('#destination').val();
            const waypoints = stopInputs.map(id => {
                const val = $(`#${id}`).val();
                return val ? { location: val, stopover: true } : null;
            }).filter(Boolean); // removes nulls

            console.log('origin:', origin);
            console.log('destination:', destination);
            console.log('waypoints:', waypoints);

            if (!origin || !destination) {
                alert("Origin and destination are required.");
                return;
            }

            directionsService.route({
                origin,
                destination,
                waypoints,
                travelMode: google.maps.TravelMode.DRIVING
            }, (result, status) => {
                console.log('status', status);
                console.log('result', result);

                if (status === "OK") {
                    directionsRenderer.setDirections(result);
                    allLegs = result.routes[0].legs;
                    allSteps = allLegs.flatMap(leg => leg.steps);
                    currentStep = 0;
                    startTracking();

                    let totalDistance = 0;
                    let totalDuration = 0;
                    allLegs.forEach(leg => {
                        totalDistance += leg.distance.value;
                        totalDuration += leg.duration.value;
                    });

                    const distanceKm = (totalDistance / 1000).toFixed(2);
                    const durationMin = Math.ceil(totalDuration / 60);
                    $('#eta-info').html(`ETA: ${durationMin} mins | Distance left: ${distanceKm} km`);
                } else {
                    alert("Could not calculate route: " + status);
                }
            });
        }



        function startTracking() {
            if (!navigator.geolocation) return alert("Geolocation not supported.");

            @if($track_ride)
            navigator.geolocation.watchPosition(position => {
                const userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                if (currentStep >= allSteps.length) return;

                const step = allSteps[currentStep];
                const end = step.end_location;
                const distance = google.maps.geometry.spherical.computeDistanceBetween(userLatLng, end);

                if (distance < 80) {
                    showInstruction(step.instructions);
                    speak(step.instructions);
                    currentStep++;
                }
            }, error => {
                console.error("Geolocation error:", error);
            }, {
                enableHighAccuracy: true,
                maximumAge: 5000,
                timeout: 10000
            });
            @endif
        }

        function speak(text) {
            const cleanedText = text.replace(/<[^>]+>/g, '');
            const utterance = new SpeechSynthesisUtterance(cleanedText);
            utterance.lang = 'en-US';
            speechSynthesis.speak(utterance);
        }

        function showInstruction(html) {
            $('#instruction-alert').html(html).fadeIn();
            setTimeout(() => {
                $('#instruction-alert').fadeOut();
            }, 8000);
        }

        function redirectToGoogleMaps() {
            const origin = encodeURIComponent($('#origin').val());
            const encodedDest = encodeURIComponent($('#destination').val());

            const isAndroid = /android/i.test(navigator.userAgent);
            const isIOS = /iphone|ipad|ipod/i.test(navigator.userAgent);

            if (isAndroid) {
                window.location.href = `intent://maps.google.com/maps?daddr=${encodedDest}&dirflg=d#Intent;scheme=https;package=com.google.android.apps.maps;end`;
            } else if (isIOS) {
                window.location.href = `comgooglemaps://?daddr=${encodedDest}&directionsmode=driving`;
            } else {
                window.location.href = `https://www.google.com/maps/dir/?api=1&destination=${encodedDest}&travelmode=driving`;
            }
        }
    </script>


    <!-- PWA: Manifest + Service Worker -->
    <link rel="manifest" href="manifest.json">
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/service-worker.js')
                .then(() => console.log("Service Worker registered"))
                .catch(err => console.error("Service Worker error:", err));
        }
    </script>


@endsection
