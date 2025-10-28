@extends('user-app.layout')

@section('title')
        <title>Taxido - User App </title>
@endsection

@section('style')
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">
    <style>
        .badge {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 0.25rem;
            text-transform: capitalize;
        }

        .btn-yellow {
            background-color: #ffc107 !important; /* Bootstrap’s yellow shade */
            color: #000;
        }

        .badge-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .badge-info {
            background-color: #17a2b8;
            color: #fff;
        }

        .badge-success {
            background-color: #28a745;
            color: #fff;
        }

        .badge-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        .badge-light {
            background-color: #f8f9fa;
            color: #212529;
        }

        .my-ride-tab-btn {
            width: 100% !important;
            padding: 12px !important;
            font-weight: 500 !important;
            line-height: 1 !important;
            font-size: 14px !important;
            white-space: nowrap !important;
            color: white !important;
        }

        .contact-wrapper {
            position: relative;
            display: inline-block;
            margin-right: 8px;
        }

        .contact-wrapper span {
            position: absolute;
            bottom: -5px;
            right: -5px;
            background: #007bff;
            color: #fff;
            font-size: 10px;
            padding: 1px 3px;
            border-radius: 50%;
        }

    </style>
    <style>
        body {
            font-family: 'Noto Color Emoji', Arial, sans-serif;
            background: #fff;
        }

        .custom-card {
            border: 3px solid gray;
            border-radius: 6px;
            padding: 5px 12px; /* small padding inside */
            font-size: 15px;
            line-height: 1.7; /* reduce line spacing */
            white-space: normal; /* remove extra whitespace handling */
            margin-bottom: 10px;
        }

        .custom-card div {
            /*margin-bottom: 15px; !* tighter gap between rows *!*/
        }

        .custom-section {
            border-top: 2px dashed #2ecc71;
            margin: 15px 0; /* less vertical spacing */
            padding-top: 10px;
            line-height: 1.7;
        }

        .custom-header {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            color: #2c3e50;
        }

        .custom-label {
            font-weight: 500;
        }

        .custom-footer {
            border-top: 2px dashed #2ecc71;
            padding-top: 10px;
            display: flex;
            /*justify-content: space-around;*/
        }

        .cancel-btn {
            background: none;
            border: 2px dotted red;
            color: red;
            padding: 5px 12px;
            border-radius: 4px;
            font-weight: bold;
        }

        .cancel-btn:hover {
            background: red;
            color: white;
        }

        .custom-footer span i,
        .custom-footer span .icon-green {
            color: #2ecc71; /* Bootstrap green */
            font-weight: bold;
        }

        .dropdown-toggle::after {
            display: none !important;
        }
    </style>
    <style>
        .progress {
            width: 120px;
            height: 120px;
            background: none;
            margin: 0 auto;
            position: relative;
        }

        .progress:after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 8px solid #eee; /* neutral background track */
            position: absolute;
            top: 0;
            left: 0;
        }

        .progress > span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .progress .progress-left {
            left: 0;
        }
        .progress .progress-right {
            right: 0;
        }

        .progress .progress-bar {
            width: 100%;
            height: 100%;
            border-width: 8px;
            border-style: solid;
            border-color: #d10b4f;
            position: absolute;
            top: 0;
        }

        .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 80px;
            border-bottom-right-radius: 80px;
            border-left: 0;
            transform-origin: center left;
        }

        .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 80px;
            border-bottom-left-radius: 80px;
            border-right: 0;
            transform-origin: center right;
        }

        /* Value inside */
        .progress .progress-value {
            width: 85%;
            height: 85%;
            border-radius: 50%;
            background: #fff;
            font-size: 20px;
            font-weight: 700;
            color: #d10b4f;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 7.5%;
            left: 7.5%;
            z-index: 1;
        }

        /* Animations */
        .progress.blue .progress-right .progress-bar {
            /*animation: loading-1 1.8s linear forwards;*/
        }
        .progress.blue .progress-left .progress-bar {
            /*animation: loading-2 1.8s linear forwards 1.8s;*/
        }

        @keyframes loading-1 {
            from { transform: rotate(0deg); }
            to   { transform: rotate(180deg); }
        }
        @keyframes loading-2 {
            from { transform: rotate(0deg); }
            to   { transform: rotate(144deg); } /* 80% = 144deg */
        }

        /* Responsive */
        @media (max-width: 990px) {
            .progress { margin-bottom: 20px; }
        }

    </style>
@endsection

@section('content')
    <!-- header starts -->
    @include('user-app.partials.header')
    <!-- header end -->

    <style>
        .search-button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            position: absolute; /* position as needed */
            right: 50px; /* adjust to align with icon */
            top: 50%;
            transform: translateY(-50%);
        }
    </style>

    <!-- search section starts -->
    <section class="home-profile-section section-b-space pt-0">
        <div class="custom-container">
            <form action="{{url('user/targeted-transport-route')}}" method="post">
                @csrf
                <div class="form-input">
                    <input type="search" name="desination_location" class="form-control with-icon"
                           placeholder="Search for a targeted transport route" id="pac-input1">
                    <input type="hidden" name="pickup_location" class="form-control with-icon" id="pac-input2" value="Sargodha Bus Stand, General Bus Stand Road, Jinnah colony, Sargodha, Pakistan">
                    <button type="submit" class="search-button">
                        <i class="iconsax search-icon" data-icon="search-normal-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- search section end -->

    <!-- slider section starts -->
    <section>
        <div class="swiper banner1 home-banner">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="img-fluid slider-img w-100" src="{{asset('assets/images/slider/slider1.png')}}" alt="slider">
                </div>
                <div class="swiper-slide">
                    <img class="img-fluid slider-img w-100" src="{{asset('assets/images/slider/slider2.png')}}" alt="slider">
                </div>
            </div>
        </div>
    </section>
    <!-- slider section end -->

    <!-- category section starts -->
    <section>
        <div class="title px-20">
            <h3>Top Categories</h3>
        </div>

        <ul class="categories-list px-20">
            <li>
                <a href="{{url('user/search-location')}}" class="categories-box">
                    <div class="d-flex flex-column flex-nowrap justify-content-between h-100">
                        <h6>Ride</h6>
                        <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                    </div>
                    <img class="img-fluid categories-img" src="{{asset('assets/images/categories/1.svg')}}" alt="c1">
                </a>
            </li>
            <li>
                <a href="{{url('user/outstation')}}" class="categories-box">
                    <div class="d-flex flex-column flex-nowrap justify-content-between h-100">
                        <h6>Outstation</h6>
                        <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>

                    </div>
                    <img class="img-fluid categories-img" src="{{asset('assets/images/categories/2.svg')}}" alt="c1">
                </a>
            </li>
            <li>
                <a href="{{url('user/rental')}}" class="categories-box">
                    <div class="d-flex flex-column flex-nowrap justify-content-between h-100">
                        <h6>Rental</h6>
                        <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                    </div>
                    <img class="img-fluid categories-img" src="{{asset('assets/images/categories/3.svg')}}" alt="c1">
                </a>
            </li>
        </ul>
    </section>
    <!-- category section end -->

    <!-- offer section starts -->
    <section>
        <div class="custom-container">
            <div class="title">
                <h3>Today’s Offer</h3>
            </div>

            <div class="row gy-3" id="driverRideList">
                @foreach($driverriderequests as $driverriderequest)

                    @php
                        $message = 'I travel - I offer my kilos of Luggage for sale';
                        $badgeClass = 'badge badge-info'; // base class
                        $badgeText = '';
                    @endphp
                    <div class="custom-card">
                        <!-- Full-width Header -->
                        <div class="card-header d-flex justify-content-between align-items-center mb-2 flex-wrap">
                            <div class="d-flex flex-column">
                                <span>👤 {{ $driverriderequest->driver->name }}</span>
                                <span>📅 Posted on: {{ $driverriderequest->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="fare fw-bold">
                                {{ $driverriderequest->price_currency }} {{ $driverriderequest->price_per_kilo }}/Kilo
                            </div>
                        </div>

                        <div class="custom-section text-center mb-2">
                            <span class="badge badge-info">I travel - I offer my kilos of Luggage for sale</span>
                        </div>

                        <!-- Two-column Layout -->
                        <div class="row align-items-center">
                            <!-- Left side: Offer Details -->
                            <div class="col-md-9 col-sm-8">

                                @if($driverriderequest->airline)
                                    <div>✈️ <span class="fw-bold">Travel Company:</span> {{ $driverriderequest->airline }}</div>
                                @endif
                                @if($driverriderequest->maritimes)
                                    <div>⛴️ <span class="fw-bold">Travel Company:</span> {{ $driverriderequest->maritimes }}</div>
                                @endif
                                    <div>🔹 <span class="fw-bold">Reference Number:</span> {{ $driverriderequest->reference_id }}</div>
                                    <div>🔹 <span class="fw-bold">Distance:</span> {{ $driverriderequest->distance }} km</div>
                                <div>⏰ <span class="fw-bold">Follow-up:</span> {{ \Carbon\Carbon::parse($driverriderequest->date_and_time_of_followup)->format('M d, Y H:i') }}</div>

                                <div>⚖️ <span class="fw-bold">Total Transport Capacity:</span> {{ $driverriderequest->total_transport_capacity }}</div>
                                <div>🛫 <span class="fw-bold">Available Transport Capacity:</span> {{ $driverriderequest->available_transport_capacity }}</div>
                                <div>🛬 <span class="fw-bold">Arrival:</span> {{ $driverriderequest->arrival_datetime }}</div>
                                <div>📅 <span class="fw-bold">Expiry:</span> {{ $driverriderequest->end_reservation_date }}</div>
                                <div>📦 <span class="fw-bold">Reception Method:</span> {{ $driverriderequest->package_receiving_method }}</div>
                            </div>

                            <!-- Right side: Circular Progress -->
                            @php
                                $reserved_kilo = $driverriderequest->total_transport_capacity - $driverriderequest->available_transport_capacity;
                                $progress = ($reserved_kilo/$driverriderequest->total_transport_capacity) * 100;
                                $progress = round($progress, 2); // keep 2 decimals
                                if ($progress <= 50) {
                                $right_rotation = ($progress / 50) * 180;
                                $left_rotation = 0;
                                } else {
                                    $right_rotation = 180;
                                    $left_rotation = (($progress - 50) / 50) * 180;
                                }
                            @endphp


                            <div class="col-md-3 col-sm-4 d-flex justify-content-center p-0">
                                <div class="progress blue">
        <span class="progress-left">
            <span class="progress-bar" style="transform: rotate({{ $left_rotation }}deg);"></span>
        </span>
                                    <span class="progress-right">
            <span class="progress-bar" style="transform: rotate({{ $right_rotation }}deg);"></span>
        </span>
                                    <div class="progress-value">{{ round($progress, 0) }}%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Full-width Pickup → Destination -->
                        <div class="custom-section text-center mt-3">
                            @if(!empty($driverriderequest->airline)) ✈️ @endif
                            @if(!empty($driverriderequest->maritimes)) 🚢 @endif
                            {{ $driverriderequest->pickup_location }}
                            ⟶ {{ implode(' ⟶ ', $driverriderequest->destination_location) }}
                        </div>

                        <!-- Footer -->
                        <div class="custom-footer d-flex align-items-center mt-2">
                            <div class="d-flex gap-2">
                                <a href="{{ url('driver/chatting') }}" class="text-decoration-none">
                                    <img class="img-fluid communication-icon"
                                         src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                </a>
                            </div>
                        </div>

                        <a href="{{route('user.accept_ride',['id'=> $driverriderequest->id])}}"
                           class="btn theme-btn w-100 auth-btn mt-3"> View details and Negotiate</a>
                    </div>


                @endforeach
            </div>
        </div>
    </section>
    <!-- offer section end -->

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

    <!-- swiper js -->
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-swiper.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <script>
        let destinationLocation = null;

        function preventFormSubmitOnEnter(inputElement) {
            inputElement.addEventListener("keydown", function (e) {
                if (e.key === "Enter") e.preventDefault();
            });
        }

        // setInterval(() => {
        //     console.log("Timeout triggered");  // Debug
        //     getDriverRideRequest();
        // }, 5000);

        function getDriverRideRequest(filterData = {}) {
            $.ajax({
                url: `/driver/get-driver-ride-request`,
                data: filterData,
                method: 'GET',
                success: function(response) {
                    let html = "";

                    if (response && response.length) {
                        response.forEach(ride => {
                            let message = "I travel - I offer my kilos of Luggage for sale";
                            let badgeClass = "badge badge-info";

                            // format dates with moment.js
                            let createdAt = ride.created_at ? moment(ride.created_at).format("MMM D, YYYY") : "";
                            // let followUp = ride.date_and_time_of_followup ? moment(ride.date_and_time_of_followup).format("MMM D, YYYY HH:mm") : "";
                            let arrival = ride.arrival_datetime ? moment(ride.arrival_datetime).format("MMM D, YYYY HH:mm") : "";
                            let expiry = ride.end_reservation_date ? moment(ride.end_reservation_date).format("MMM D, YYYY") : "";

                            html += `
                        <div class="custom-card">
                            <!-- Header -->
                            <div class="custom-header d-flex justify-content-between align-items-center">
                                <span>👤 ${ride.driver?.name ?? ""}</span>
                                <span>${ride.price_currency} ${ride.price_per_kilo}/Kilo</span>
                            </div>
                            <div><span class="custom-label">📅 Posted on:</span> ${createdAt}</div>

                            <!-- Badge -->
                            <div class="custom-section text-center">
                                <span class="${badgeClass}">${message}</span>
                            </div>

                            <div>⏰ <span class="fw-bold">Follow-up:</span> ${createdAt}</div>
                            <div>🔹 <span class="fw-bold">Distance:</span> ${ride.distance} km</div>

                            ${ride.airline ? `<div>✈️ <span class="fw-bold">Travel Company:</span> ${ride.airline}</div>` : ""}
                            ${ride.maritimes ? `<div>⛴️ <span class="fw-bold">Travel Company:</span> ${ride.maritimes}</div>` : ""}

                            <div>⚖️ <span class="fw-bold">Total Transport Capacity:</span> ${ride.total_transport_capacity}</div>
                            <div>🛫 <span class="fw-bold">Available Transport Capacity:</span> ${ride.available_transport_capacity}</div>
                            <div>🛬 <span class="fw-bold">Arrival:</span> ${arrival}</div>
                            <div>📅 <span class="fw-bold">Expiry:</span> ${expiry}</div>
                            <div>📦 <span class="fw-bold">Reception Method:</span> ${ride.package_receiving_method ?? ""}</div>

                            <div class="custom-section text-center">
                                ${ride.airline ? "✈️" : ""}
                                ${ride.maritimes ? "🚢" : ""}
                                ${ride.pickup_location} ⟶ ${(Array.isArray(ride.destination_location) ? ride.destination_location.join(" ⟶ ") : "")}
                            </div>

                            <!-- Contact + Details -->
                            <div class="custom-footer d-flex align-items-center">
                                <div class="d-flex gap-2">
                                    <a href="/driver/chatting" class="text-decoration-none">
                                        <img class="img-fluid communication-icon" src="/assets/images/svg/messages-fill.svg" alt="messages">
                                    </a>
                                </div>
                            </div>
                            <a href="/user/accept-ride/${ride.id}" class="btn theme-btn w-100 auth-btn mt-3"> View details and Negotiate</a>
                        </div>
                    `;
                        });
                    } else {
                        html = `<p>No Driver Ride requests available.</p>`;
                    }

                    $("#driverRideList").html(html);
                },
                error: function(err) {
                    console.error("Error fetching driver ride requests:", err);
                }
            });
        }


        function initMap() {
            // Pickup Location
            const input1 = document.getElementById("pac-input1");
            preventFormSubmitOnEnter(input1);
            const autocomplete1 = new google.maps.places.Autocomplete(input1, {
                fields: ["geometry", "formatted_address"],
            });
            autocomplete1.addListener("place_changed", () => {
                const place = autocomplete1.getPlace();
                if (!place.geometry) return;
                destinationLocation = place;
            });

            // Autofill Pickup Location using Geolocation + Geocoder
            // const pickupInput = document.getElementById("pac-input2");
            // navigator.geolocation.getCurrentPosition((position) => {
            //     const lat = position.coords.latitude;
            //     const lng = position.coords.longitude;
            //
            //     const geocoder = new google.maps.Geocoder();
            //     const latlng = { lat, lng };
            //
            //     geocoder.geocode({ location: latlng }, (results, status) => {
            //         if (status === "OK" && results[0]) {
            //             pickupInput.value = results[0].formatted_address;
            //         } else {
            //             console.warn("Geocoder failed due to: " + status);
            //         }
            //     });
            // }, (error) => {
            //     console.warn("Geolocation error:", error.message);
            // }, {
            //     enableHighAccuracy: true,
            //     timeout: 10000,
            //     maximumAge: 0
            // });

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>

@endsection
