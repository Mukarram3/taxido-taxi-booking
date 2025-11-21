@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')
    <style>
        #map { height: 70vh; width: 100%; }
        .controls { margin: 10px; }
        .controls input { margin: 5px 0; width: 100%; padding: 8px; font-size: 14px; }
    </style>

@endsection

@section('content')
    <!-- header starts -->
    @include('user-app.partials.header')
    <!-- header end -->

    <!-- my ride section starts -->
    <section>

        <div class="custom-container" id="map">

        </div>
    </section>
    <!-- my ride section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    @include('user-app.partials.bottom-navbar')
    <!-- bottom navbar end -->

    <!-- sidebar starts -->
    @include('user-app.partials.sidear')
    <!-- sidebar end -->

    @endsection

    @section('script')

        <script>
            let map, marker, directionsService, directionsRenderer;

            const pickupLocation = {!! json_encode($pickup_location ?? '') !!};
            const destinationArray = {!! json_encode(json_decode($destination_location ?? '[]')) !!};
            let url = window.location.href;
            let id = url.substring(url.lastIndexOf('/') + 1);

            function initMap() {
                fetch(`/user/get-driver-location/${id}`)
                    .then(res => res.json())
                    .then(data => {
                        const latLng = new google.maps.LatLng(data.lat, data.lng);

                        map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 14,
                            center: latLng
                        });

                        marker = new google.maps.Marker({
                            map: map,
                            position: latLng,
                            icon: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                        });

                        drawRoute();
                        pollDriverLocation();
                    });
            }

            function drawRoute() {
                directionsService = new google.maps.DirectionsService();
                directionsRenderer = new google.maps.DirectionsRenderer({ map: map });

                const origin = pickupLocation;
                const destination = destinationArray[destinationArray.length - 1];
                const waypoints = destinationArray.slice(0, -1).map(loc => ({
                    location: loc,
                    stopover: true
                }));

                directionsService.route({
                    origin,
                    destination,
                    waypoints,
                    travelMode: google.maps.TravelMode.DRIVING
                }, (result, status) => {
                    if (status === "OK") {
                        directionsRenderer.setDirections(result);
                    } else {
                        alert("Could not draw route: " + status);
                    }
                });
            }

            function pollDriverLocation() {
                setInterval(() => {
                    fetch(`/user/get-driver-location/${id}`)
                        .then(res => res.json())
                        .then(data => {
                            console.log("Driver Location:", data);
                            if (data.lat && data.lng) {
                                const latLng = new google.maps.LatLng(data.lat, data.lng);
                                marker.setPosition(latLng);
                                map.panTo(latLng);
                            }
                        });
                }, 5000);
            }

            window.initMap = initMap;
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&callback=initMap" async defer></script>

    @endsection
