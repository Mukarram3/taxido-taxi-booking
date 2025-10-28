@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <style>
        #infowindow-content{
            display: none !important;
        }
        #infowindow-content2{
            display: none !important;
        }
    </style>

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <div class="flex-spacing gap-2 w-100">
                    <a href="{{url('user/home')}}">
                        <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                    </a>

{{--                    <select class="form-select rider-options">--}}
{{--                        <option selected>Switch Rider</option>--}}
{{--                        <option value="1">My Self</option>--}}
{{--                    </select>--}}
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <form method="get" action="{{ route('user.selact_ride') }}">
        <input type="hidden" name="distance" id="distance">
        @csrf
    <!-- location section starts -->
    <section class="location-section pt-0">
        <div class="custom-container">
            <ul class="pickup-location-listing" id="location-list">
                <li>
                    <div class="location-box">
                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                        <input type="text" id="pac-input" class="form-control" required placeholder="Pickup location" name="pickup_location">
                    </div>
                </li>
                <li>
                    <div class="location-box">
                        <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                        <input type="text" required id="pac-input2" class="form-control border-0"
                            placeholder="Enter destination" name="destination_location[]">
                        <i class="iconsax add-stop" data-icon="add"></i>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- location section starts -->

    <!-- categories place list starts -->
{{--    <section class="category-place-section">--}}
{{--        <div class="custom-container">--}}
{{--            <ul class="categories-place-list">--}}
{{--                <li>--}}
{{--                    <a href="#" class="categories-place-box">--}}
{{--                        <img class="place-icon" src="{{asset('assets/images/svg/home-fill.svg')}}" alt="home">--}}
{{--                        <h5>Home</h5>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#" class="categories-place-box">--}}
{{--                        <img class="place-icon" src="{{asset('assets/images/svg/work-fill.svg')}}" alt="home">--}}
{{--                        <h5>Work</h5>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- categories place list end -->

    <!-- recent search list starts -->
    <section>
        <div class="custom-container">
            <h3 class="title-color fw-medium mb-2">Recent</h3>
            <ul class="recent-place-list">
                @foreach($ridebookeds as $ridebooked)
                    <li>
                        <div class="recent-box">
                            <div class="recent-icon">
                                <img class="icon" src="{{asset('assets/images/svg/history.svg')}}" alt="history">
                            </div>
                            <div>
                                <h5>{{ $ridebooked->pickup_location }}</h5>
                                @php
                                $destinations = json_decode($ridebooked->destination_location);
                                @endphp
                                @foreach($destinations as $destination)
                                    <p>{{ $destination }}</p>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <button type="submit" class="btn theme-btn w-100">Continue</button>
            </div>
        </div>
    </section>
    <!-- recent search list end -->
    </form>
    <!-- ride-offcanvas starts -->
    <div class="offcanvas ride-offcanvas" tabindex="-1" id="ride">
        <div class="offcanvas-body p-0">
            <h3>Someone else taking this ride?</h3>
            <p>Choose a contact so that they also get driver number, vehicle details and ride OTP via SMS.</p>

            <div class="form-check">
                <label class="form-check-label" for="fixed1"> <i class="iconsax icon" data-icon="user-1"></i>
                    My Self</label>
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed1" checked="">
            </div>
            <a href="{{ url('user/choose-rider') }}" class="choose-contact">
                <div class="flex-align-center gap-2">
                    <img class="img-fluid user-icon" src="{{asset('assets/images/svg/user-octagon.svg')}}" alt="user">
                    <h5>Choose another contact</h5>
                </div>
                <i class="iconsax icon-btn" data-icon="chevron-right"> </i>
            </a>
        </div>
        <div class="offcanvas-footer flex-align-center flex-nowrap gap-3 border-0 pt-3 px-0 pb-0">
            <a href="{{ url('user/selact-ride') }}" class="btn gray-btn title-color w-100 mt-0">Skip</a>
            <a href="{{ url('user/selact-ride') }}" class="btn theme-btn w-100 mt-0">Continue</a>
        </div>
    </div>
    <!-- ride-offcanvas end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    @endsection

@section('script')

        <script>
            let stopCounter = 1;
            let pickupLocation = null;
            let destinationLocation = null;
            const stopLocations = [];

            function preventFormSubmitOnEnter(inputElement) {
                inputElement.addEventListener("keydown", function (e) {
                    if (e.key === "Enter") e.preventDefault();
                });
            }

            function initMap() {
                // Pickup Location
                const input1 = document.getElementById("pac-input");
                preventFormSubmitOnEnter(input1);
                const autocomplete1 = new google.maps.places.Autocomplete(input1, {
                    fields: ["geometry", "formatted_address"],
                });
                autocomplete1.addListener("place_changed", () => {
                    const place = autocomplete1.getPlace();
                    if (!place.geometry) return;
                    pickupLocation = place;
                    calculateRouteDistance();
                });

                // Final Destination
                const input2 = document.getElementById("pac-input2");
                preventFormSubmitOnEnter(input2);
                const autocomplete2 = new google.maps.places.Autocomplete(input2, {
                    fields: ["geometry", "formatted_address"],
                });
                autocomplete2.addListener("place_changed", () => {
                    const place = autocomplete2.getPlace();
                    if (!place.geometry) return;
                    destinationLocation = place;
                    calculateRouteDistance();
                });

                // Add stop handler
                document.querySelector('.add-stop').addEventListener('click', function () {
                    stopCounter++;
                    const newStop = document.createElement('li');
                    newStop.classList.add('destination-stop');
                    newStop.innerHTML = `
                <div class="location-box">
                    <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                    <input type="text" id="pac-input${stopCounter}" class="form-control border-0" placeholder="Enter destination" name="destination_location[]">
                    <i class="fas fa-times remove-stop"></i>
                </div>
            `;
                    document.getElementById('location-list').appendChild(newStop);

                    const input = newStop.querySelector(`#pac-input${stopCounter}`);
                    preventFormSubmitOnEnter(input);

                    const autocomplete = new google.maps.places.Autocomplete(input, {
                        fields: ["geometry", "formatted_address"],
                    });

                    autocomplete.addListener("place_changed", () => {
                        const place = autocomplete.getPlace();
                        if (!place.geometry) return;
                        stopLocations[stopCounter] = place;
                        calculateRouteDistance();
                    });

                    // Remove stop
                    newStop.querySelector('.remove-stop').addEventListener('click', () => {
                        stopLocations[stopCounter] = null;
                        newStop.remove();
                        calculateRouteDistance();
                    });
                });
            }

            function calculateRouteDistance() {
                if (!pickupLocation || !destinationLocation) return;

                const directionsService = new google.maps.DirectionsService();

                const waypoints = stopLocations
                    .filter(Boolean)
                    .map(stop => ({
                        location: stop.formatted_address,
                        stopover: true
                    }));

                const request = {
                    origin: pickupLocation.formatted_address,
                    destination: destinationLocation.formatted_address,
                    waypoints: waypoints,
                    travelMode: 'DRIVING'
                };

                directionsService.route(request, function (result, status) {
                    if (status === 'OK') {
                        let totalDistance = 0;
                        result.routes[0].legs.forEach((leg, index) => {
                            console.log(`Segment ${index + 1}: ${leg.start_address} → ${leg.end_address} = ${leg.distance.text}`);
                            totalDistance += leg.distance.value; // meters
                        });

                        const distanceInKm = (totalDistance / 1000).toFixed(2);
                        console.log(`Total Driving Distance: ${distanceInKm} km`);
                        document.getElementById("distance").value = `${distanceInKm}`;
                    }
                    else {
                        console.error('Directions request failed due to ', status);
                    }
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>
@endsection
