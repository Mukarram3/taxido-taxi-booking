@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')
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
            min-height: 150vh !important;
        }
    </style>
@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header position-absolute bg-transparent" style="z-index: 1000;">
        <div class="custom-container">
            <div class="header-panel p-0">
                <a href="{{url('user/home')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- Simplified wrapper structure for better scrolling -->
    <div class="main-content-wrapper">
        <div class="scrollable-content">
            <!-- Select ride section starts -->
            {{--    <div class="location-map position-relative w-100 h-100" id="map"></div>--}}
            <div class="theme-content-bg ride-content-bg">
                <form action="{{ route('user.request_fare') }}" method="post">
                    @csrf
                    <input type="hidden" name="driverriderequest_id" value="{{ $driverriderrequest->id }}">
                    <input type="hidden" name="driver_location_latitude" id="driver_location_latitude">
                    <input type="hidden" name="driver_location_longitude" id="driver_location_longitude">
                    <div class="my-ride-box">
                        <div class="my-ride-head">
                            <a href="{{url('driver/accept-ride-confirmed')}}" class="my-ride-img">
                                <img class="img-fluid profile-img" src="{{ $driverriderrequest->profile ? asset('storage/'.$driverriderrequest->profile) : asset('assets/images/profile/p4.png') }}" alt="p5">
                            </a>

                            <div class="my-ride-content flex-column">
                                <div class="flex-spacing">
                                    <a href="#">
                                        <h5 class="p-0 title-color fw-medium">{{ $driverriderrequest->driver->name }}</h5>
                                    </a>
                                    <div class="flex-align-center">
                                        <h5 class="fw-mediun theme-color price ps-2 pe-0">{{ $driverriderrequest->price_currency }}{{ $driverriderrequest->price_per_kilo }}/kilo</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-ride-details">
                            <div class="d-flex flex-column pt-3">
                                <h4 class="fw-bold mb-3">{{ $driverriderrequest->travel_company }}</h4>

                                <ul class="ride-location-listing">
                                    <p class="mb-2">Collection Addresses</p>
                                    @foreach($driverriderrequest->collection_address as $collection_address)
                                        <li class="border-0 shadow-none box-background">
                                            <div class="location-box bg-transparent">
                                                <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                <h5 class="fw-light title-color border-0">{{ $collection_address}}</h5>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                <p class="mb-2 mt-2">
                                    <strong>Delivery Address:</strong> {{ $driverriderrequest->delivery_address }}
                                </p>

                                <p class="mb-2">
                                    <strong>Expiration Date:</strong> {{ $driverriderrequest->end_reservation_date }}
                                </p>

                                <p class="mb-2">
                                    <strong>Reception Method:</strong> {{ $driverriderrequest->package_receiving_method }}
                                </p>

                                <p class="mb-2">
                                    <strong>Online Date:</strong> {{ $driverriderrequest->created_at->format('d M Y') }}
                                </p>

                                <p class="mb-2">
                                    <strong>Price per Kilo:</strong> {{ $driverriderrequest->price_currency }}{{ $driverriderrequest->price_per_kilo }}/kilo
                                </p>

                                <p class="mb-2">
                                    <strong>Total Transport Capacity in Kilos:</strong> {{ $driverriderrequest->total_transport_capacity }}
                                </p>

                                <p class="mb-0">
                                    <strong>Available Transport Capacity in Kilos:</strong> {{ $driverriderrequest->available_transport_capacity}}
                                </p>
                            </div>
                            <ul class="ride-location-listing">
                                Pickup -> Destination
                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                                        <h5 class="fw-light title-color">{{ $driverriderrequest->pickup_location }}</h5>
                                    </div>
                                </li>
                                @foreach($driverriderrequest->destination_location as $location)
                                    <li class="border-0 shadow-none box-background">
                                        <div class="location-box bg-transparent">
                                            <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                            <h5 class="fw-light title-color border-0">{{ $location}}</h5>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label mb-2">Receiver Details</label>
                            <br>
                            <label class="form-label mb-2" for="receiver_name">Name</label>
                            <input type="text" class="form-control white-background" id="receiver_name" name="receiver_name"
                                   placeholder="Enter Receiver Name">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="receiver_email">Email</label>
                            <input type="email" class="form-control white-background" id="receiver_email" name="receiver_email"
                                   placeholder="Enter Receiver Email">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="receiver_phone">Phone</label>
                            <input type="number" class="form-control white-background" id="receiver_phone" name="receiver_phone"
                                   placeholder="Enter Receiver Phone">
                        </div>

                        <h5 class="mt-3 mb-2 px-0 fw-medium title-color">Offer Your Fare per kilo</h5>

                        <div class="fare-box">
                            <div class="icon sub"> -10</div>
                            <input type="number" value="{{ $driverriderrequest->price_per_kilo }}" name="requested_fare">
                            <div class="icon add"> +10</div>
                        </div>

                        <h5 class="mt-3 mb-2 px-0 fw-medium title-color">Offer Your Reserved Kilos</h5>

                        <div class="fare-box">
                            <div class="icon sub"> -10</div>
                            <!-- Fixed input name from requested_fare to requested_kilos -->
                            <input type="number" value="10" name="requested_kilos">
                            <div class="icon add"> +10</div>
                        </div>

                    </div>

                    <button type="submit" class="btn theme-btn w-100 mt-3">Request Fare</button>
                    {{--                    <a href="{{route('driver.ride_verification',['userriderequest_id' => $userriderequest->id])}}"--}}
                    {{--                       class="btn theme-btn w-100 mt-3">Accept Fare on ${{ $userriderequest->fare }}</a>--}}
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
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
                // getDriverRideRequestStatus();
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
        })
    </script>

@endsection

