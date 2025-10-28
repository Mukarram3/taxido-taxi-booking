@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')

    @php
        $userriderequest = \App\Models\Userriderequest::find($userriderequest_id);
    @endphp

    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('user/search-location')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <a href="#alert" data-bs-toggle="offcanvas" data-id="{{ $userriderequest->id }}" class="cancel_offerBtn">
                    <span class="fw-medium theme-color">Cancel Ride</span>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <div class="location-map position-relative w-100 h-100" id="map"></div>

    <!-- driver request section starts -->
    <section class="pt-0 driver-request section-b-space" style="position: absolute; top: 165px; z-index: 1000; width: 100%">
        <div class="custom-container">
            <ul class="driver-list" id="driverFareList">
                <div class="alert alert-success" role="alert">
                    {{ $userriderequest->message }}
                </div>
            </ul>
        </div>
    </section>
    <!-- driver request section end -->

    <!-- alert offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="alert">
        <div class="offcanvas-body p-0">
            <div class="alert-part">
                <div class="title-content w-75 text-center mx-auto">
                    <h3 class="fw-medium justify-content-center">Are you sure you want to cancel ?</h3>
                </div>
                <form class="theme-form mt-0" action="{{url('driver/cancel-offer')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" class="offer_id">
                    <ul class="reasons-list">
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed01">
                                    <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/user-cross.svg')}}"
                                         alt="user-cross"> Recipient Unavailable</label>
                                <input class="form-check-input" type="radio" name="reason" value="Recipient Unavailable" id="fixed01">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed03">
                                    <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/security-time.svg')}}"
                                         alt="security"> Package Error</label>
                                <input class="form-check-input" type="radio" name="reason" value="Package Error" id="fixed03">
                            </div>
                        </li>
                    </ul>
                    <div class="mt-5">
                        <a href="{{url('user/my-rides')}}" class="btn theme-btn w-100 mt-0">Close</a>
                        <button type="submit" class="btn theme-btn w-100 mt-1">Cancel Transport</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- alert offcanvas end -->

    <!-- reasons offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="reasons">
        <div class="offcanvas-body p-0">
            <div class="alert-part">
                <div class="title-content">
                    <h3 class="justify-content-center">Why do you want to cancel?</h3>
                </div>

                <form class="theme-form mt-0" action="{{url('driver/cancel-offer')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" class="offer_id">
                    <ul class="reasons-list">
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed01">
                                    <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/user-cross.svg')}}"
                                         alt="user-cross"> Recipient Unavailable</label>
                                <input class="form-check-input" type="radio" name="reason" value="Recipient Unavailable" id="fixed01">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed03">
                                    <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/security-time.svg')}}"
                                         alt="security"> Package Error</label>
                                <input class="form-check-input" type="radio" name="reason" value="Package Error" id="fixed03">
                            </div>
                        </li>
                    </ul>
                    <div class="mt-5">
                        <a href="{{url('user/my-rides')}}" class="btn theme-btn w-100 mt-0">Close</a>
                        <button type="submit" class="btn theme-btn w-100 mt-1">Cancel Transport</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- reasons offcanvas end -->

    @endsection

    @section('script')

        <!-- map js -->
{{--        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>--}}
{{--        <script src="{{asset('assets/js/custom-map.js')}}"></script>--}}

        <script>
            const userId = {{ Auth::guard('user')->id() }};
            const userRequestId = {{ $userriderequest_id }};
            let fareRequestInterval;

            let map;
            let userMarker;
            let driverMarkers = [];

            // This function is called by Google Maps API after loading (due to callback=initMap)
            function initMap() {
                console.log("Google Maps API loaded.");

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
                        icon: {
                            // url: "/assets/images/user-pin.png", // optional custom pin
                            scaledSize: new google.maps.Size(40, 40)
                        },
                        title: "Your Location",
                    });

                    fetchNearbyDrivers(userLat, userLng);

                });

                // Start polling driver fare requests every 2 seconds
                fareRequestInterval = setInterval(() => {
                    console.log("Timeout triggered");  // Debug
                    getDriverFareRequest();
                }, 2000);

                // Your existing AJAX function, unchanged except for logging improvements
                function getDriverFareRequest() {
                    $.ajax({
                        url: `/user/get-driver-fare-request?userriderequest_id=${userRequestId}`,
                        method: 'GET',
                        success: function(response) {
                            if (response.ridebooked) {
                                toastr.success("Ride booked");
                                window.location.href = '{{ url('/user/home') }}';
                                return;
                            }

                            if (response && response.length) {
                                let html = '';

                                response.forEach(item => {
                                    if (!item.user_lat || !item.user_lng || !item.driver_location_latitude || !item.driver_location_longitude) {
                                        console.warn("Missing lat/lng for item", item);
                                        return;
                                    }

                                    const userLatLng = new google.maps.LatLng(item.user_lat, item.user_lng);
                                    const driverLatLng = new google.maps.LatLng(item.driver_location_latitude, item.driver_location_longitude);

                                    // Compute straight-line distance
                                    const distanceMeters = google.maps.geometry.spherical.computeDistanceBetween(driverLatLng, userLatLng);
                                    const distanceKm = (distanceMeters / 1000).toFixed(2);
                                    const estTime = Math.ceil((distanceKm / 40) * 60); // rough estimate @ 40km/h

                                    html += `
                        <li>
                            <div class="driver-box">
                                <div class="profile-head">
                                    <div class="flex-align-center gap-2">
                                        <img class="img-fluid profile-img" src="${item.driver?.profile ? '/storage/' + item.driver.profile : '/assets/images/profile/p8.png'}" alt="profile">
                                        <h5>${item.driver?.vehicle_type}</h5>
                                    </div>
                                    <h4 class="fw-medium success-color">${item.userriderequest?.fare_currency} ${item.requested_fare}</h4>
                                </div>
                                <div class="flex-spacing mt-2">
                                    <h5 class="fw-normal title-color">${item.driver?.name ?? 'Unknown Driver'}</h5>
                                    <h6 class="fw-normal content-color">${estTime} min</h6>
                                </div>
                                <div class="flex-spacing mt-2">
                                    <div class="flex-align-center gap-1">
                                        <img class="star" src="/assets/images/svg/star.svg" alt="star">
                                        <h5 class="fw-normal title-color">4.8</h5>
                                        <span class="content-color fw-normal">(127)</span>
                                    </div>
                                    <h6 class="fw-normal content-color">${distanceKm} km</h6>
                                </div>
                                <div class="grid-btn mt-2">
                                    <a href="#" id="reject_request" data-driver_id="${item.driver_id}" data-driverfarerequest_id="${item.id}" class="btn gray-btn w-100 m-0">Skip</a>
                                    <a href="/user/accept-ride-details?driverfarerequest_id=${item.id}&driver_id=${item.driver_id}" class="btn theme-btn w-100 m-0">Accept</a>
                                </div>
                                <div class="progress mt-2" role="progressbar">
                                    <div class="progress-bar w-0"></div>
                                </div>
                            </div>
                        </li>
                    `;
                                });

                                $('#driverFareList').html(html);
                            } else {
                                $('#driverFareList').html('<li><p><div class="alert alert-success" role="alert">Carrier search in progress</div></p></li>');
                            }
                        },
                        error: function(xhr) {
                            console.error("Error fetching fare requests:", xhr.responseText);
                        }
                    });
                }
            }

            function fetchNearbyDrivers(lat, lng) {
                $.get('/user/nearby-drivers', { lat, lng }, function (drivers) {
                    clearDriverMarkers();

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

            $(document).on('click', '#reject_request', function (e) {
                e.preventDefault();
                var driver_request_id = $(this).data('driverfarerequest_id');

                $.ajax({
                    url: `/user/reject-ride-details?driver_request_id=${driver_request_id}`,
                    method: 'GET',
                    success: function(response) {

                        if (response && response.length) {
                            let html = '';

                            response.forEach(item => {
                                html += `
                        <li>
                            <div class="driver-box">
                                <div class="profile-head">
                                    <div class="flex-align-center gap-2">
                                        <img class="img-fluid profile-img" src="${item.driver?.profile ? '/storage/' + item.driver.profile : '/assets/images/profile/p8.png'}" alt="profile">
                                        <h5>${item.driver?.vehicle_type}</h5>
                                    </div>
                                    <h4 class="fw-medium success-color">${item.userriderequest?.fare_currency} ${item.requested_fare}</h4>
                                </div>
                                <div class="flex-spacing mt-2">
                                    <h5 class="fw-normal title-color">${item.driver?.name ?? 'Unknown Driver'}</h5>
                                    <h6 class="fw-normal content-color">4 min</h6>
                                </div>
                                <div class="flex-spacing mt-2">
                                    <div class="flex-align-center gap-1">
                                        <img class="star" src="/assets/images/svg/star.svg" alt="star">
                                        <h5 class="fw-normal title-color">4.8</h5>
                                        <span class="content-color fw-normal">(127)</span>
                                    </div>
                                    <h6 class="fw-normal content-color">4 km</h6>
                                </div>
                                <div class="grid-btn mt-2">
                                    <a href="#" id="reject_request" data-deriver_id="${item.driver_id}" data-driverfarerequest_id="${item.id}" class="btn gray-btn w-100 m-0">Skip</a>
                                    <a href="/user/accept-ride-details?driverfarerequest_id=${item.id}&driver_id=${item.driver_id}" class="btn theme-btn w-100 m-0">Accept</a>
                                </div>
                                <div class="progress mt-2" role="progressbar">
                                    <div class="progress-bar w-0"></div>
                                </div>
                            </div>
                        </li>
                    `;
                            });

                            $('#driverFareList').html(html);
                        } else {
                            $('#driverFareList').html('<li><p>No fare requests available.</p></li>');
                        }
                    },
                    error: function(xhr) {
                        console.error("Error fetching fare requests:", xhr.responseText);
                    }
                });
            })

            $('.cancel_offerBtn').click(function (){
                $('.offer_id').val($(this).data('id'));
            })

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>
{{--        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw&libraries=geometry&callback=initMap" async defer></script>--}}


    @endsection
