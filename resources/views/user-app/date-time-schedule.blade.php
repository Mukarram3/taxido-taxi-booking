@extends('user-app.layout')

    @section('title')
        <title>Taxido - User App </title>
@endsection

@section('style')

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .badge {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 0.25rem;
            text-transform: capitalize;
        }

        .badge-warning { background-color: #ffc107; color: #212529; }
        .badge-info    { background-color: #17a2b8; color: #fff; }
        .badge-success { background-color: #28a745; color: #fff; }
        .badge-secondary { background-color: #6c757d; color: #fff; }
        .badge-light   { background-color: #f8f9fa; color: #212529; }
        .badge-danger   { background-color: red; color: white; }
    </style>

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('user/home')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">Targeted Transport Routes</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <div class="location-map position-relative w-100 h-100" id="map"></div>

    <!-- active offer section starts -->
    <section class="upcoming-ride-section">
        <div class="custom-container">
            <div class="title">
                <h4>Apply Filter</h4>
            </div>
            <!-- === Filter Section Starts === -->
            <div class="filter-bar mt-3 mb-4 p-3 shadow-sm rounded bg-light">
                <form id="driverFilters" method="get" action="{{ url('user/filtered-targeted-transport-route') }}">
                    <input type="hidden" value='@json($matches)' name="matches">
                    <input type="hidden" value="{{ $pickupAddress }}" name="pickupAddress">
                    <input type="hidden" value="{{ $destinationAddress }}" name="destinationAddress">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">City</label>
                            <input type="text" name="city" id="filterCity" class="form-control" placeholder="Enter city">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Country</label>
                            <input type="text" name="country" id="filterCountry" class="form-control" placeholder="Enter country">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-bold">Expiry Date</label>
                            <input type="date" name="expiry" id="filterExpiry" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-bold">Online Date</label>
                            <input type="date" name="online_date" id="filterOnlineDate" class="form-control">
                        </div>

                        <div class="col-md-2 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="urgent" id="filterUrgent">
                                <label class="form-check-label small fw-bold">Urgent Ads</label>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="professional" id="filterProfessional">
                                <label class="form-check-label small fw-bold">Professional Ads</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- === Filter Section Ends === -->
            <div class="title">
                <h4>Carrier's Routes</h4>
            </div>
            <ul class="my-ride-list driver-ride-list mt-0" id="userRideList">
                @forelse($matches as $index => $match)
                    <li>
                        <div class="my-ride-box">
                            <form action="{{ url('user/select-ride-targetted') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $pickupAddress ? $pickupAddress : '' }}" id="pickupAddress" name="pickup_location">
                                <input type="hidden" value="{{ $destinationAddress ? $destinationAddress : '' }}" id="destinationAddress" name="destination_location">
                                <input type="hidden" id="distance" name="distance">
                                <input type="hidden" value="{{ $match->driver_id }}" name="driver_id">
                                <div class="my-ride-head">
                                    <button type="submit" class="my-ride-img btn btn-outline-none">
                                        <img class="img-fluid profile-img"
                                             src="{{ $match->user?->profile ? asset('storage/' . $match->user->profile) : asset('assets/images/profile/p5.png') }}"
                                             alt="p5">
                                    </button>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <button type="submit" class="btn btn-outline-none">
                                                <h5 class="title-color fw-medium">{{ $match->user?->name }}</h5>
                                            </button>
{{--                                            <div class="flex-align-center">--}}
{{--                                                <div class="flex-align-center gap-1 pe-2">--}}
{{--                                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">--}}
{{--                                                    <h5 class="fw-normal title-color p-0">4.8</h5>--}}
{{--                                                </div>--}}
{{--                                                --}}{{--                                            <h5 class="fw-mediun theme-color price ps-2 pe-0">{{ $match->fare_currency }} {{ $match->fare }}</h5>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="my-ride-details">
                                <div class="ride-info">

                                    <div class="d-flex flex-column gap-1">
                                        @if($match->is_urgent == '1')
                                            <span class="badge badge-danger">Urgent</span>
                                        @endif
                                        @if($match->is_professional == '1')
                                            <span>
                                                <i class="fa-solid fa-user text-primary fs-4" style="font-size: 16px !important; color: green !important;" title="Professional"></i>
                                            Professional
                                            </span>
                                        @endif

                                        <div class="d-flex align-items-center gap-1">
                                            <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                                            <h6 class="fw-normal title-color mb-0">{{ $match->distance }} km</h6>
                                        </div>
                                    </div>
                                    <div class="flex-align-center gap-2">
                                        <a href="{{url('driver/chatting')}}">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>
                                    </div>
                                </div>
                                <ul class="ride-location-listing">
                                    <li class="border-0 shadow-none box-background">
                                        <div class="location-box bg-transparent">
                                            <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                 alt="location">
                                            <h5 class="fw-light title-color">{{ $match->pickup_location }}</h5>
                                        </div>
                                    </li>

                                    @php
                                        $locations = json_decode($match->destination_location, true); // returns array
                                    @endphp

                                    @foreach($locations as $location)
                                        <li class="border-0 shadow-none box-background">
                                            <div class="location-box bg-transparent">
                                                <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                <h5 class="fw-light title-color border-0">{{ $location }}</h5>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <form action="{{ url('user/select-ride-targetted') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $pickupAddress ? $pickupAddress : '' }}" id="pickupAddress" name="pickup_location">
                                <input type="hidden" value="{{ $destinationAddress ? $destinationAddress : '' }}" id="destinationAddress" name="destination_location">
                                <input type="hidden" id="distance-{{ $index }}" name="distance">
                                <input type="hidden" value="{{ $match->driver_id }}" name="driver_id">
                                <button type="submit" class="btn theme-btn w-100 auth-btn mt-3">Formulate Transport Request</button>
                            </form>
                        </div>
                    </li>
                @empty
                    <p>No Carrier Available for This Route.</p>
                @endforelse
            </ul>
        </div>
    </section>
    <!-- active offer section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    @endsection

    @section('script')

        <!-- swiper js -->
        <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/custom-swiper.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/js/all.min.js" integrity="sha512-gBYquPLlR76UWqCwD06/xwal4so02RjIR0oyG1TIhSGwmBTRrIkQbaPehPF8iwuY9jFikDHMGEelt0DtY7jtvQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let filterData = {};
            let map;
            let userMarker;
            let driverMarkers = [];

            // Update filters on input/change
            $('#driverFilters input').on('input change', function() {
                filterData = $('#driverFilters').serialize();
                getTargetedRides(); // fetch immediately on filter change
            });

            function initMap() {
                const directionsService = new google.maps.DirectionsService();
                const geocoder = new google.maps.Geocoder();

                navigator.geolocation.getCurrentPosition(position => {
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;

                    const userLatLng = new google.maps.LatLng(userLat, userLng);

                    map = new google.maps.Map(document.getElementById("map"), {
                        center: userLatLng,
                        zoom: 14,
                    });

                    userMarker = new google.maps.Marker({
                        position: userLatLng,
                        map,
                        icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                        title: "Your Location",
                    });

                    fetchNearbyDrivers(userLat, userLng);

                });

                document.querySelectorAll("input[name='pickup_location']").forEach((pickupInput, index) => {
                    const pickupAddress = pickupInput.value;
                    const destinationAddress = document.querySelectorAll("input[name='destination_location']")[index].value;
                    const distanceInput = document.querySelectorAll("input[name='distance']")[index];

                    if (!pickupAddress || !destinationAddress) return;

                    geocoder.geocode({ address: pickupAddress }, function (pickupResults, pickupStatus) {
                        if (pickupStatus === "OK") {
                            geocoder.geocode({ address: destinationAddress }, function (destResults, destStatus) {
                                if (destStatus === "OK") {
                                    const request = {
                                        origin: pickupResults[0].formatted_address,
                                        destination: destResults[0].formatted_address,
                                        travelMode: 'DRIVING'
                                    };

                                    directionsService.route(request, function (result, status) {
                                        if (status === 'OK') {
                                            let totalDistance = 0;
                                            result.routes[0].legs.forEach(leg => {
                                                totalDistance += leg.distance.value;
                                            });

                                            const distanceInKm = (totalDistance / 1000).toFixed(2);
                                            distanceInput.value = distanceInKm;
                                        }
                                    });
                                }
                            });
                        }
                    });
                });
            }

            function fetchNearbyDrivers(lat, lng) {
                $.get('/user/nearby-drivers', { lat, lng }, function (drivers) {
                    clearDriverMarkers();

                    console.log(drivers);

                    drivers.forEach(driver => {
                        const driverLatLng = new google.maps.LatLng(driver.latitude, driver.longitude);

                        const marker = new google.maps.Marker({
                            position: driverLatLng,
                            map,
                            title: driver.name ?? "Nearby Driver",
                        });

                        driverMarkers.push(marker);
                    });
                });
            }

            function clearDriverMarkers() {
                driverMarkers.forEach(marker => marker.setMap(null));
                driverMarkers = [];
            }

            function getTargetedRides() {
                $.ajax({
                    url: $('#driverFilters').attr('action'), // POST route
                    type: 'get',
                    data: filterData,
                    success: function(response) {
                        renderTargetedRides(response.matches, response.pickupAddress, response.destinationAddress);
                    },
                    error: function(xhr) {
                        console.error("Error fetching rides:", xhr.responseText);
                    }
                });
            }

            // Function to render rides dynamically
            function renderTargetedRides(matches, pickupAddress = '', destinationAddress = '') {
                let html = '';

                if (!matches || matches.length === 0) {
                    html = '<p>No Carrier Available for This Route.</p>';
                } else {
                    matches.forEach((match, index) => {
                        let destinations = [];
                        try {
                            destinations = JSON.parse(match.destination_location);
                        } catch (e) {
                            destinations = [match.destination_location];
                        }

                        let destinationHtml = destinations.map(location => `
                <li class="border-0 shadow-none box-background">
                    <div class="location-box bg-transparent">
                        <img class="icon" src="/assets/images/svg/gps.svg" alt="gps">
                        <h5 class="fw-light title-color border-0">${location}</h5>
                    </div>
                </li>
            `).join('');

                        let profileImg = match.user?.profile ? `/storage/${match.user.profile}` : '/assets/images/profile/p5.png';

                        html += `
            <li>
                <div class="my-ride-box">

                    <form action="/user/select-ride-targetted" method="post">
                        <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                        <input type="hidden" name="pickup_location" value="${pickupAddress}">
                        <input type="hidden" name="destination_location" value="${destinationAddress}">
                        <input type="hidden" name="distance" id="distance-${index}">
                        <input type="hidden" name="driver_id" value="${match.driver_id}">

                        <div class="my-ride-head">
                            <button type="submit" class="my-ride-img btn btn-outline-none">
                                <img class="img-fluid profile-img" src="${profileImg}" alt="profile">
                            </button>

                            <div class="my-ride-content flex-column">
                                <div class="flex-spacing">
                                    <button type="submit" class="btn btn-outline-none">
                                        <h5 class="title-color fw-medium">${match.user?.name ?? 'Unknown'}</h5>
                                    </button>
<!--                                    <div class="flex-align-center">-->
<!--                                        <div class="flex-align-center gap-1 pe-2">-->
<!--                                            <img class="star" src="/assets/images/svg/star.svg" alt="star">-->
<!--                                            <h5 class="fw-normal title-color p-0">4.8</h5>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="my-ride-details">
                        <div class="ride-info">
                                <div class="d-flex flex-column gap-1">
                                    ${match.is_urgent == 1 ? '<span class="badge badge-danger">Urgent</span>' : ''}
                                    ${match.is_professional == 1 ? `
                                    <span>
                                        <i class="fa-solid fa-user" style="font-size:16px; color:green;" title="Professional"></i>
                                        Professional
                                    </span>
                                    ` : ''}
                                        <div class="d-flex align-items-center gap-1">
                                            <img class="icon img-fluid" src="/assets/images/svg/location-fill.svg"
                                                 alt="location">
                                            <h6 class="fw-normal title-color">${match.distance} km</h6>
                                        </div>
                                    </div>
                            <div class="flex-align-center gap-2">
                                <a href="/driver/chatting">
                                    <img class="img-fluid communication-icon" src="/assets/images/svg/messages-fill.svg" alt="messages">
                                </a>
                            </div>
                        </div>

                        <ul class="ride-location-listing">
                            <li class="border-0 shadow-none box-background">
                                <div class="location-box bg-transparent">
                                    <img class="icon" src="/assets/images/svg/location-fill.svg" alt="location">
                                    <h5 class="fw-light title-color">${match.pickup_location}</h5>
                                </div>
                            </li>
                            ${destinationHtml}
                        </ul>
                    </div>

                    <form action="/user/select-ride-targetted" method="post">
                        <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                        <input type="hidden" name="pickup_location" value="${pickupAddress}">
                        <input type="hidden" name="destination_location" value="${destinationAddress}">
                        <input type="hidden" name="distance" id="distance-2-${index}">
                        <input type="hidden" name="driver_id" value="${match.driver_id}">
                        <button type="submit" class="btn theme-btn w-100 auth-btn mt-3">Formulate Transport Request</button>
                    </form>

                </div>
            </li>
            `;
                    });
                }

                $('#userRideList').html(html);
            }


        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>

@endsection
