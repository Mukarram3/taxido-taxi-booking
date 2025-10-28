@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
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

        .btn-yellow {
            background-color: #ffc107 !important; /* Bootstrap’s yellow shade */
            color: #000;
        }

        .my-ride-tab-btn {
            width: 100% !important;
            padding: 12px !important;
            font-weight: 500 !important;
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
            justify-content: space-around;
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

@endsection

@section('content')

    @php
        $allMeans = \App\Models\Mean_of_transport::all()->pluck('name', 'id'); // returns [id => name]
    @endphp

    <!-- header starts -->
    <header id="header" class="main-header">
        <div class="custom-container">
            <div class="header-panel">
                <div class="flex-align-center gap-2">
                    <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                        <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                    </a>
                    <img class="img-fluid logo" src="{{asset('assets/images/logo/driver/driver-logo-white.png')}}" alt="logo">
                </div>

                @if(\Illuminate\Support\Facades\Auth::guard('driver')->user())

                <div class="flex-align-center gap-sm-3 gap-2">
                    @php
                        $notifications = \Illuminate\Support\Facades\Auth::guard('driver')->user()->unreadNotifications;
                    @endphp
                    @if(count($notifications)>0)
                    <a href="{{url('driver/notification')}}">
                        <i class="iconsax icon-btn noti-icon" data-icon="bell-2"> </i>
                    </a>
                    @endif
                </div>

                @endif
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- upcoming ride section starts -->
    <section class="upcoming-ride-section d-none">
        <div class="custom-container">
            <div class="title">
                <h4>New Upcoming Ride</h4>
            </div>
            <ul class="my-ride-list driver-ride-list mt-0">
                <li>
                    <div class="my-ride-box">
                        <div class="my-ride-head">
                            <a href="{{url('driver/accept-ride')}}" class="my-ride-img">
                                <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p5.png')}}" alt="p5">
                            </a>

                            <div class="my-ride-content flex-column">
                                <div class="flex-spacing">
                                    <a href="{{url('driver/accept-ride')}}">
                                        <h5 class="title-color fw-medium">Peter Thornton</h5>
                                    </a>
                                    <div class="flex-align-center">
                                        <div class="flex-align-center gap-1 pe-2">
                                            <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                            <h5 class="fw-normal title-color p-0">4.8</h5>
                                        </div>
                                        <h5 class="fw-mediun theme-color price ps-2 pe-0">$256</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-ride-details">
                            <div class="ride-info">
                                <div class="flex-align-center gap-1">
                                    <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                        alt="location">
                                    <h6 class="fw-normal title-color">10 km</h6>
                                </div>
                                <h6 class="fw-normal title-color">10 May’25 at 4:10 AM</h6>
                            </div>
                            <ul class="ride-location-listing">
                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                            alt="location">
                                        <h5 class="fw-light title-color">17, Yonge St, Toronto, Canada</h5>
                                    </div>
                                </li>

                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                        <h5 class="fw-light title-color border-0">20, Avenue St, Toronto, Canada</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="my-ride-box">
                        <div class="my-ride-head">
                            <a href="{{url('driver/accept-ride')}}" class="my-ride-img">
                                <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p6.png')}}" alt="p5">
                            </a>

                            <div class="my-ride-content flex-column">
                                <div class="flex-spacing">
                                    <a href="{{url('driver/accept-ride')}}">
                                        <h5 class="title-color fw-medium">Tony Danza</h5>
                                    </a>
                                    <div class="flex-align-center">
                                        <div class="flex-align-center gap-1 pe-2">
                                            <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                            <h5 class="fw-normal title-color p-0">4.4</h5>
                                        </div>
                                        <h5 class="fw-mediun theme-color price ps-2 pe-0">$158</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-ride-details">
                            <div class="ride-info">
                                <div class="flex-align-center gap-1">
                                    <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                        alt="location">
                                    <h6 class="fw-normal title-color">8 km</h6>
                                </div>
                                <h6 class="fw-normal title-color">15 May’25 at 10:15 AM</h6>
                            </div>
                            <ul class="ride-location-listing">
                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                            alt="location">
                                        <h5 class="fw-light title-color">10, Avenue St, Toronto, Canada</h5>
                                    </div>
                                </li>

                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                        <h5 class="fw-light title-color border-0">35, Critch Cir, Toronto, Canada
                                        </h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- upcoming ride section end -->

    <!-- category section starts -->
    <section>
        <div class="title px-20">
            <h3>Top Categories</h3>
        </div>

        <ul class="categories-list px-20">
            <li>
                <a href="{{url('driver/search-location')}}" class="categories-box">
                    <div class="d-flex flex-column flex-nowrap justify-content-between h-100">
                        <h6>Air Travel - offer kilos of luggage for sale</h6>
                        <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                    </div>
                    <img class="img-fluid categories-img" src="{{asset('assets/images/categories/1.svg')}}" alt="c1">
                </a>
            </li>
            <li>
                <a href="{{url('driver/search-location')}}" class="categories-box">
                    <div class="d-flex flex-column flex-nowrap justify-content-between h-100">
                        <h6>Sea Travel, book your parcel shipments</h6>
                        <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>

                    </div>
                    <img class="img-fluid categories-img" src="{{asset('assets/images/categories/2.svg')}}" alt="c1">
                </a>
            </li>
            <li>
                <a href="#" class="categories-box">
                    <div class="d-flex flex-column flex-nowrap justify-content-between h-100">
                        <h6>Submit a transport offer</h6>
                        <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                    </div>
                    <img class="img-fluid categories-img" src="{{asset('assets/images/categories/3.svg')}}" alt="c1">
                </a>
            </li>
        </ul>
    </section>
    <!-- category section end -->

    <!-- active offer section starts -->
    <section class="upcoming-ride-section">
        <div class="custom-container">
            <div class="title">
                <h4>Today’s Offer</h4>
            </div>
            <!-- === Filter Section Starts === -->
            <div class="filter-bar mt-3 mb-4 p-3 shadow-sm rounded bg-light">
                <form id="driverFilters" method="GET" action="">
                    <div class="row g-3">
                        <!-- Filter by City -->
                        <div class="col-md-6">
                            <label for="filterCity" class="form-label small fw-bold">City</label>
                            <input type="text" name="city" id="filterCity" class="form-control" placeholder="Enter city">
                        </div>

                        <!-- Filter by Country -->
                        <div class="col-md-6">
                            <label for="filterCountry" class="form-label small fw-bold">Country</label>
                            <input type="text" name="country" id="filterCountry" class="form-control" placeholder="Enter country">
                        </div>

                        <!-- Filter by Expiration Date -->
                        <div class="col-md-3">
                            <label for="filterExpiry" class="form-label small fw-bold">Expiry Date</label>
                            <input type="date" name="expiry" id="filterExpiry" class="form-control">
                        </div>

                        <!-- Filter by Online Date -->
                        <div class="col-md-3">
                            <label for="filterOnlineDate" class="form-label small fw-bold">Online Date</label>
                            <input type="date" name="online_date" id="filterOnlineDate" class="form-control">
                        </div>

                        <!-- Filter by Urgent Ads -->
                        <div class="col-md-2 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="urgent" id="filterUrgent">
                                <label class="form-check-label small fw-bold" for="filterUrgent">
                                    Urgent Ads
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="professional" id="filterProfessional">
                                <label class="form-check-label small fw-bold" for="filterProfessional">
                                    Professional Ads
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12 text-end">
                            <a href="{{ url()->current() }}" class="btn btn-outline-secondary px-4">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- === Filter Section Ends === -->
            <ul class="my-ride-list driver-ride-list mt-3" id="userRideList">
                @forelse($userriderequests as $userriderequest)
                    @php
                        $message = $userriderequest->message;
                        $badgeClass = 'badge'; // base class
                        $badgeText = $userriderequest->transport_title;

                        switch ($message) {
                            case 'On the way to pickup':
                                $badgeClass .= ' badge-success'; // yellow
                                $badgeText = 'On the way to pickup';
                                break;
                            case 'delivery in progress':
                                $badgeClass .= ' badge-success'; // blue
                                $badgeText = 'Package Being Delivered';
                                break;
                                case 'Parcel returned':
                                $badgeClass .= ' badge-success'; // blue
                                $badgeText = 'Parcel returned';
                                break;
                                case 'transport completed awaiting validation':
                                $badgeClass .= ' badge-success'; // blue
                                $badgeText = 'Transport Completed Awaiting Validation';
                                break;
                            case 'package delivered':
                                $badgeClass .= ' badge-success'; // green
                                $badgeText = 'Package Delivered';
                                break;
                            case 'finished':
                                $badgeClass .= ' badge-secondary'; // gray
                                $badgeText = 'Finished';
                                break;
                            default:
                                $badgeClass .= ' badge-light'; // fallback
                                $badgeText = ucfirst(str_replace('_', ' ', $message));
                                break;
                        }
                    @endphp
                    <div class="custom-card">
                        <!-- Header -->
                        <div class="custom-header">
                            <div class="d-flex flex-column">
                                <span>👤 {{ $userriderequest->user->name }}</span>
                                <div><span class="custom-label">📅 Posted on:</span> {{ $userriderequest->created_at->format('M d, Y') }}</div>
                            </div>
                            <div class="d-flex flex-column">
                                <span>{{ $userriderequest->fare_currency }} {{ $userriderequest->fare }}</span>
                                @if($userriderequest->is_urgent == '1')
                                    <span class="badge badge-danger">Urgent</span>
                                @endif
                                @if($userriderequest->is_professional == '1')
                                    <span>
                                                <i class="fa-solid fa-user text-primary fs-4" style="font-size: 16px !important; color: green !important;" title="Professional"></i>
                                            Professional
                                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex justify-content-center fw-bold text-white mt-1">
                            <span class="badge bg-info" style="border-radius: 10px">Looking for a traveler to carry</span>
                        </div>

                        <div class="custom-section">
                            📦 {{ $badgeText }}
                        </div>

                        <!-- Ride Type -->
                        <div class="custom-section">
                            <div>
                                📦 <span class="custom-label">Transport:</span> {{ $userriderequest->transport_title }}
                            </div>
                            <div>🔹 <span class="custom-label">Reference Number:</span> {{ $userriderequest->reference_id }}</div>
                            <div>🔹 <span class="custom-label">Distance:</span> {{ $userriderequest->distance }} km</div>
                            <div>⏰ <span class="custom-label">Follow-up:</span> {{ \Illuminate\Support\Carbon::parse($userriderequest->date_and_time_of_followup)->format('M d, Y') }}</div>
                            @if(!empty($userriderequest->departure_date))
                                <div>📅 <span class="custom-label">Departure:</span> {{ $userriderequest->departure_date }}</div>
                            @endif

                            @if(!empty($userriderequest->arrival_date))
                                <div>📅 <span class="custom-label">Arrival:</span> {{ $userriderequest->arrival_date }}</div>
                            @endif

                            @if(!empty($userriderequest->expiry))
                                <div>📅 <span class="custom-label">Expiration:</span> {{ \Illuminate\Support\Carbon::parse($userriderequest->expiry)->format('M d, Y') }}</div>
                            @endif
                        </div>

                        <!-- Route -->
                        <div class="custom-section text-center">
                            {{ $userriderequest->pickup_location }} ⟶ {{ implode(', ', json_decode($userriderequest->destination_location, true)) }}
                        </div>

                        <div class="custom-footer d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-2">
                                <a href="{{ url('driver/chatting') }}" class="text-decoration-none">
                                    <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                </a>
                            </div>
                        </div>


                        <div class="text-center my-3">
                            <a href="{{route('driver.accept_ride',['id'=>$userriderequest->id])}}" class="btn theme-btn w-100 auth-btn mt-3"> View details and negotiate</a>
                            @php
                                if (\Illuminate\Support\Facades\Auth::guard('driver')->check()){
                                    $driver_request = \App\Models\Driverfarerequest::where('driver_id',\Illuminate\Support\Facades\Auth::guard('driver')->user()->id)->where('userriderequest_id', $userriderequest->id)->orderby('id','desc')->first();
                                    if ($driver_request && $driver_request->status == 'waiting' && $userriderequest->id == $driver_request->userriderequest_id){
                                        $text = 'Transport Request Sent';
                                    }
                                    else{
                                        $text = 'Send a transport request';
                                    }
                                }
                                else{
                                    $text = 'Send a transport request';
                                }
                            @endphp
                            <button type="button" class="btn theme-btn w-100 auth-btn mt-3 accept-fare-btn"
                                    data-userriderequest_id="{{ $userriderequest->id }}"
                                    data-requested_fare="{{ $userriderequest->fare }}">
                                {{ $text }}
                            </button>
                        </div>
                    </div>
                @empty
                    <p>No Ride requests available.</p>
                @endforelse
            </ul>
        </div>
    </section>
    <!-- active offer section end -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/js/all.min.js" integrity="sha512-gBYquPLlR76UWqCwD06/xwal4so02RjIR0oyG1TIhSGwmBTRrIkQbaPehPF8iwuY9jFikDHMGEelt0DtY7jtvQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script>

        let filterData = {}; // store current filter state

        $('#driverFilters input').on('input change', function () {
            // collect all filter values into filterData
            filterData = {
                city: $('#filterCity').val(),
                country: $('#filterCountry').val(),
                expiry: $('#filterExpiry').val(),
                online_date: $('#filterOnlineDate').val(),
                urgent: $('#filterUrgent').is(':checked') ? 1 : '',
                professional: $('#filterProfessional').is(':checked') ? 1 : ''
            };
            getUserRideRequest();
        });

        setInterval(() => {
            console.log("Timeout triggered");  // Debug
            getUserRideRequest();
        }, 5000);

        function getUserRideRequest() {
            $.ajax({
                url: `/user/get-user-ride-request`,
                data: filterData,
                method: 'GET',
                success: function(response) {

                    let html = "";

                    if (response && response.length) {
                        response.forEach(userriderequest => {
                            // Badge logic
                            let badgeClass = "badge";
                            let badgeText = userriderequest.transport_title;

                            switch (userriderequest.message) {
                                case "On the way to pickup":
                                    badgeClass += " badge-success";
                                    badgeText = "On the way to pickup";
                                    break;
                                case "delivery in progress":
                                    badgeClass += " badge-success";
                                    badgeText = "Package Being Delivered";
                                    break;
                                case "Parcel returned":
                                    badgeClass += " badge-success";
                                    badgeText = "Parcel returned";
                                    break;
                                case "transport completed awaiting validation":
                                    badgeClass += " badge-success";
                                    badgeText = "Transport Completed Awaiting Validation";
                                    break;
                                case "package delivered":
                                    badgeClass += " badge-success";
                                    badgeText = "Package Delivered";
                                    break;
                                case "finished":
                                    badgeClass += " badge-secondary";
                                    badgeText = "Finished";
                                    break;
                                default:
                                    badgeClass += " badge-light";
                                    badgeText = userriderequest.message
                                        ? userriderequest.message.replace(/_/g, " ").charAt(0).toUpperCase() +
                                        userriderequest.message.slice(1)
                                        : "";
                            }

                            let destination = userriderequest.destination_location;
                            if (typeof destination === "string") {
                                try {
                                    destination = JSON.parse(destination);
                                } catch (e) {
                                    destination = [];
                                }
                            }
                            let destinationText = Array.isArray(destination) ? destination.join(", ") : "";

                            // Build HTML card
                            html += `
                        <div class="custom-card">
                            <div class="custom-header d-flex justify-content-between">
                                <div>
                                    👤 ${userriderequest.user?.name ?? ""}
                                    <div><span class="custom-label">📅 Posted on:</span> ${moment(userriderequest.created_at).format("MMM D, YYYY")}</div>
                                </div>
                                <div>
                                    ${userriderequest.fare_currency} ${userriderequest.fare}
                                    ${userriderequest.is_urgent == "1" ? `<span class="badge badge-danger">Urgent</span>` : ""}
                                    ${userriderequest.is_professional == "1" ? `<span><i class="fa-solid fa-user text-primary" style="color:green;font-size:16px" title="Professional"></i> Professional</span>` : ""}
                                </div>
                            </div>

                            <div class="d-flex justify-content-center fw-bold text-white mt-1">
                                <span class="badge bg-info" style="border-radius:10px">Looking for a traveler to carry</span>
                            </div>

                            <div class="custom-section">📦 ${badgeText}</div>

                            <div class="custom-section">
                                <div>📦 <span class="custom-label">Transport:</span> ${userriderequest.transport_title}</div>
                                <div>🔹 <span class="custom-label">Reference Number:</span> ${userriderequest.reference_id}</div>
                                <div>🔹 <span class="custom-label">Distance:</span> ${userriderequest.distance} km</div>
                                <div>⏰ <span class="custom-label">Follow-up:</span> ${moment(userriderequest.date_and_time_of_followup).format("MMM D, YYYY")}</div>
                                ${userriderequest.departure_date ? `<div>📅 <span class="custom-label">Departure:</span> ${userriderequest.departure_date}</div>` : ""}
                                ${userriderequest.arrival_date ? `<div>📅 <span class="custom-label">Arrival:</span> ${userriderequest.arrival_date}</div>` : ""}
                                ${userriderequest.expiry ? `<div>📅 <span class="custom-label">Expiration:</span> ${moment(userriderequest.expiry).format("MMM D, YYYY")}</div>` : ""}
                            </div>

                            <div class="custom-section text-center">
                                ${userriderequest.pickup_location} ⟶ ${destinationText}
                            </div>

                            <div class="custom-footer d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-2">
                                    <a href="/driver/chatting" class="text-decoration-none">
                                        <img class="img-fluid communication-icon" src="/assets/images/svg/messages-fill.svg" alt="messages">
                                    </a>
                                </div>
                            </div>

                            <div class="text-center my-3">
                                <a href="/driver/accept-ride/${userriderequest.id}" class="btn theme-btn w-100 auth-btn mt-3"> View details and negotiate</a>
                                <button type="button" class="btn theme-btn w-100 auth-btn mt-3 accept-fare-btn"
                                        data-userriderequest_id="${userriderequest.id}"
                                        data-requested_fare="${userriderequest.fare}">
                                    Send a transport request
                                </button>
                            </div>
                        </div>
                    `;
                        });
                    } else {
                        html = `<p>No Ride requests available.</p>`;
                    }

                    $("#userRideList").html(html);
                },
                error: function(xhr) {
                    console.error("Error fetching fare requests:", xhr.responseText);
                }
            });
        }

        $(document).on('click', '.accept-fare-btn', function(e) {
            e.preventDefault();

            const rideId = $(this).data('userriderequest_id');
            const fare = $(this).data('requested_fare');
            const button = $(this);

            // Disable button to prevent multiple clicks
            button.prop('disabled', true).text('Getting Location...');

            // Get current location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;

                        // Create form dynamically
                        const form = $('<form>', {
                            'method': 'POST',
                            'action': '/driver/request-fare'
                        });

                        // Add CSRF token
                        form.append($('<input>', {
                            'type': 'hidden',
                            'name': '_token',
                            'value': $('meta[name="csrf-token"]').attr('content')
                        }));

                        // Add required hidden inputs
                        form.append($('<input>', {
                            'type': 'hidden',
                            'name': 'userriderequest_id',
                            'value': rideId
                        }));

                        form.append($('<input>', {
                            'type': 'hidden',
                            'name': 'driver_location_latitude',
                            'value': latitude
                        }));

                        form.append($('<input>', {
                            'type': 'hidden',
                            'name': 'driver_location_longitude',
                            'value': longitude
                        }));

                        form.append($('<input>', {
                            'type': 'hidden',
                            'name': 'requested_fare',
                            'value': fare
                        }));

                        // Append to body and submit
                        $('body').append(form);
                        form.submit();
                    },
                    function(error) {
                        // Re-enable button on error
                        button.prop('disabled', false).text(`Send a transport
request $ ${fare}`);

                        let errorMessage = 'Unable to get your location. ';
                        switch(error.code) {
                            case error.PERMISSION_DENIED:
                                errorMessage += 'Please enable location permissions.';
                                break;
                            case error.POSITION_UNAVAILABLE:
                                errorMessage += 'Location information is unavailable.';
                                break;
                            case error.TIMEOUT:
                                errorMessage += 'Location request timed out.';
                                break;
                            default:
                                errorMessage += 'An unknown error occurred.';
                                break;
                        }
                        alert(errorMessage);
                    },
                    {
                        enableHighAccuracy: true,
                        timeout: 10000,
                        maximumAge: 60000
                    }
                );
            } else {
                button.prop('disabled', false).text(`Accept Fare on $ ${fare}`);
                alert('Geolocation is not supported by this browser.');
            }
        });

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
            const input1 = document.getElementById("filterCity");
            preventFormSubmitOnEnter(input1);
            const autocomplete1 = new google.maps.places.Autocomplete(input1, {
                fields: ["geometry", "formatted_address"],
            });
            autocomplete1.addListener("place_changed", () => {
                const place = autocomplete1.getPlace();
                if (!place.geometry) return;
                pickupLocation = place;
            });

            // Final Destination
            const input2 = document.getElementById("filterCountry");
            preventFormSubmitOnEnter(input2);
            const autocomplete2 = new google.maps.places.Autocomplete(input2, {
                fields: ["geometry", "formatted_address"],
            });
            autocomplete2.addListener("place_changed", () => {
                const place = autocomplete2.getPlace();
                if (!place.geometry) return;
                destinationLocation = place;
            });
        }


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>
@endsection
