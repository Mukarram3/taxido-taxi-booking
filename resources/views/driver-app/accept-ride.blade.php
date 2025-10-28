@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')
    <style>
        .scrollable-content {
            max-height: calc(100vh - 80px); /* adjust for header/footer if any */
            overflow-y: auto;
        }
        li{
            display: block; !important;
        }
    </style>
    <style>
        /* More aggressive CSS overrides to ensure scrolling works */
        html, body {
            height: auto !important;
            min-height: 100vh !important;
            max-height: none !important;
            overflow-y: scroll !important;
            overflow-x: hidden !important;
            scrollbar-width: auto !important;
            position: static !important;
        }

        /* Re-enable webkit scrollbars */
        body::-webkit-scrollbar {
            width: 12px !important;
            display: block !important;
        }

        body::-webkit-scrollbar-track {
            background: #f1f1f1 !important;
        }

        body::-webkit-scrollbar-thumb {
            background: #888 !important;
            border-radius: 6px !important;
        }

        /* Ensure main content can scroll naturally */
        .main-content-wrapper {
            padding-top: 80px;
            height: auto !important;
            max-height: none !important;
            overflow: visible !important;
        }

        /* Remove any height constraints that might prevent scrolling */
        .scrollable-content, .theme-content-bg, .ride-content-bg {
            height: auto !important;
            min-height: auto !important;
            max-height: none !important;
            overflow: visible !important;
            position: static !important;
        }

        /* Ensure form and content can expand naturally */
        form, .my-ride-box {
            height: auto !important;
            max-height: none !important;
            overflow: visible !important;
        }

        /* Override Bootstrap container constraints */
        .container, .container-fluid, .custom-container {
            height: auto !important;
            max-height: none !important;
            overflow: visible !important;
        }

        /* Ensure ride content has enough height */
        .theme-content-bg {
            /*min-height: 150vh !important;*/
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header position-absolute bg-transparent">
        <div class="custom-container">
            <div class="header-panel p-0">
                <a href="{{url('driver/home')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- Select ride section starts -->
        <div class="main-content-wrapper">
            <div class="scrollable-content">
    {{--    <div class="location-map position-relative w-100 h-100" id="map"></div>--}}
                 <div class="theme-content-bg ride-content-bg">
                    <form action="{{ route('driver.request_fare') }}" method="post">
            @csrf
            <input type="hidden" name="userriderequest_id" value="{{ $userriderequest->id }}">
            <input type="hidden" name="driver_location_latitude" id="driver_location_latitude">
            <input type="hidden" name="driver_location_longitude" id="driver_location_longitude">
            <div class="my-ride-box">
                <div class="my-ride-head">
                    <a href="{{url('driver/accept-ride-confirmed')}}" class="my-ride-img">
                        <img class="img-fluid profile-img" src="{{ optional($userriderequest->user)->profile
            ? asset('storage/' . $userriderequest->user->profile)
            : asset('assets/images/profile/p4.png') }}" alt="p5">
                    </a>

                    <div class="my-ride-content flex-column">
                        <div class="flex-spacing">
                            <a href="#">
                                <h5 class="p-0 title-color fw-medium">{{ $userriderequest->user->name }}</h5>
                            </a>
                            <div class="flex-align-center">
                                <div class="flex-align-center gap-1 pe-2">
                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    <h5 class="fw-normal title-color p-0">4.8</h5>
                                </div>
                                <h5 class="fw-mediun theme-color price ps-2 pe-0">{{ $userriderequest->fare_currency }} {{ $userriderequest->fare }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-ride-details">
                    <div class="ride-info">
                        <div class="flex-align-center gap-1">
                            <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                 alt="location">
                            <h6 class="fw-normal title-color">{{ $userriderequest->distance }} km</h6>
                        </div>
{{--                        <h6 class="fw-normal title-color">{{ $userriderequest->departure_date }}</h6>--}}
                    </div>
                    @php
                        $means = json_decode($userriderequest->means_of_transport, true);
                        $destination_location = json_decode($userriderequest->destination_location, true);
                                    $meanNames = is_array($means)
                                        ? \App\Models\Mean_of_transport::whereIn('id', $means)->pluck('name')->toArray()
                                        : [];
                    @endphp
                    <div class="d-flex flex-column">
                        <p>Type of Package :- {{ $userriderequest->packagetype->title }}</p>
                        <p>Sub Type of Package :- {{ $userriderequest->packagesubtype->title }}</p>
                        <p>Length of Package :- {{ $userriderequest->length_of_package }}</p>
                        <p>Width of Package :- {{ $userriderequest->width_of_package }}</p>
                        <p>Weight of Package :- {{ $userriderequest->weight_of_package }}</p>
                        <p>Quantity of Package :- {{ $userriderequest->quantity_of_package }}</p>
                        <p>Mean of Transports :- {{ is_array($meanNames) ? implode(', ', $meanNames) : '' }}</p>
{{--                        <p>Departure Date :- {{ $userriderequest->departure_date }}</p>--}}
                        <p>Expiry Date :- {{ $userriderequest->expiry }}</p>
                    </div>
                    <div class="d-flex flex-row">
                        @php
                            $parcel_pictures = $userriderequest->parcel_pictures ? json_decode($userriderequest->parcel_pictures) : '';
                        @endphp
                        @if($parcel_pictures)
                            @foreach($parcel_pictures as $parcel_picture)
                                <img src="{{ asset('storage/'. $parcel_picture) }}" class="me-1" width="50" height="50"
                                     alt="loading">
                            @endforeach
                        @endif
                    </div>
                    <ul class="ride-location-listing">
                        <li class="border-0 shadow-none">
                            <div class="location-box">
                                <img class="icon bg-transparent" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                     alt="location">
                                <h5 class="fw-light title-color px-0">{{ $userriderequest->pickup_location }}</h5>
                            </div>
                        </li>
                        @php
                            $locations = json_decode($userriderequest->destination_location, true); // returns array
                        @endphp
                        @foreach($locations as $location)
                            <li class="border-0 shadow-none">
                                <div class="location-box">
                                    <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}"
                                         alt="gps">
                                    <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                    </h5>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="form-group mt-0 form-step">
                    <label for="means_of_transport">Mean Of Transport</label>
                    <select class="form-control white-background select2" name="means_of_transport" id="means_of_transport">
                        <option>Select Means of Transport</option>
                        @foreach(\App\Models\Mean_of_transport::where('status','1')->get() as $mean_of_transport)
                            <option value="{{ $mean_of_transport->id }}">{{ $mean_of_transport->name }}</option>
                        @endforeach
                    </select>
                </div>

                <h5 class="mt-3 mb-2 px-0 fw-medium title-color">Offer Your Fare</h5>

                <div class="fare-box">
                    <div class="icon sub"> -10</div>
                    <input type="number" value="{{ $userriderequest->fare }}" name="requested_fare">
                    <div class="icon add"> +10</div>
                </div>

            </div>

            <button type="submit" class="btn theme-btn w-100 mt-3">Request Fare</button>
{{--            <a href="{{route('driver.ride_verification',['userriderequest_id' => $userriderequest->id])}}"--}}
{{--               class="btn theme-btn w-100 mt-3">Accept Fare on ${{ $userriderequest->fare }}</a>--}}
        </form>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
    {{--    <script src="{{asset('assets/js/custom-map.js')}}"></script>--}}

    <!-- iconsax js -->
    <script src="{{asset('assets/js/quantity.js')}}"></script>
    <script>

        // $('#driver_location_latitude').val('32.1030');
        // $('#driver_location_longitude').val('72.6598');

        if ("geolocation" in navigator) {
            navigator.geolocation.watchPosition(
                (position) => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    console.log(`Location updated: ${lat}, ${lng}`);

                    $('#driver_location_latitude').val(lat);
                    $('#driver_location_longitude').val(lng);
                },
                (error) => {
                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            console.error("User denied the request for Geolocation.");
                            break;
                        case error.POSITION_UNAVAILABLE:
                            console.error("Location information is unavailable.");
                            break;
                        case error.TIMEOUT:
                            console.error("The request to get user location timed out.");
                            break;
                        case error.UNKNOWN_ERROR:
                            console.error("An unknown error occurred.");
                            break;
                    }
                },
                {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 5000,
                }
            );
        } else {
            console.error("Geolocation is not supported by this browser.");
        }


    </script>
    <script>
        $(document).ready(function () {
            setInterval(() => {
                console.log("Timeout triggered");  // Debug
                getDriverRideRequestStatus();
            }, 5000);

            let pathSegments = window.location.pathname.split('/');
            var rideId = pathSegments[pathSegments.length - 1]; // Gets the last segment

            function getDriverRideRequestStatus() {
                let pathSegments = window.location.pathname.split('/');
                var rideId = pathSegments[pathSegments.length - 1]; // Gets the last segment
                $.ajax({
                    url: `/user/get-driver-ride-request-status/` + rideId,
                    method: 'GET',
                    success: function (response) {
                        console.log('AJAX response:', response); // Inspect this
                        if (response.status == 'accepted') {
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.href = '/driver/home';
                            }, 2000);
                        }
                        if (response.ride_status) {
                            toastr.success('Ride booked by another driver');
                            setTimeout(() => {
                                window.location.href = '/driver/home';
                            }, 2000);
                        }
                        if (response.status == 'rejected') {
                            toastr.success('Your Fare request Rejected');
                        }
                    },
                    error: function (xhr) {
                        console.error("Error fetching fare requests:", xhr.responseText);
                    }
                });
            }

            $('#means_of_transport').select2({});

        })
    </script>

@endsection
