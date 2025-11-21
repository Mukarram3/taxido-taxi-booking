@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

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

    @php
        $allMeans = \App\Models\Mean_of_transport::all()->pluck('name', 'id'); // returns [id => name]
        $icons = [
                                                        'pedestrian' => '🚶',
                                                        'car' => '🚗',
                                                        'Taxi / VTC' => '🚕',
                                                        'bus' => '🚌',
                                                        'coach' => '🚐',
                                                        'Van/minibus' => '🚐',
                                                        'bicycle' => '🚲',
                                                        'motorcycle' => '🛵',
                                                        'Truck' => '🚜',
                                                        '4×4' => '🚙',
                                                        'plane' => '✈️',
                                                        'Helicopter' => '🚁',
                                                        'Ferry/cruise ship' => '🚢',
                                                        'Cargo/cargo ship' => '⛴️',
                                                        'Speedboat' => '🚤',
                                                        'Kayak/canoe' => '🛶',
                                                        'train' => '🚆',
                                                        'TGV' => '🚄',
                                                        'Tram' => '🚈',
                                                        'Metro' => '🚇',
                                                    ];
    @endphp

        <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <div class="flex-align-center gap-2">
                    <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                        <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                    </a>
                    <h3 class="categories-title"> My Ride</h3>
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

    <!-- my ride section starts -->
    <section class="section-b-space">
        <ul class="nav nav-pills my-ride-tab w-100 border-0 m-0" id="Tab" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="btn btn-warning my-ride-tab-btn active" id="pill-pending-tab" data-bs-toggle="pill"
                        data-bs-target="#active-tab">In Progress
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="btn btn-primary" id="pill-pending-tab" data-bs-toggle="pill"
                        data-bs-target="#pending-tab">Accepted
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-pending_offers-tab" data-bs-toggle="pill"
                        data-bs-target="#pending_offers-tab">On Hold
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-personal_offers-tab" data-bs-toggle="pill"
                        data-bs-target="#personal_offers-tab">My Personal Offers
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="btn btn-success my-ride-tab-btn" id="pill-complete-tab" data-bs-toggle="pill"
                        data-bs-target="#complete-tab">Finished
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-danger my-ride-tab-btn" id="pill-cancel-tab" data-bs-toggle="pill"
                        data-bs-target="#cancel-tab">Cancelled
                </button>
            </li>
        </ul>

        <div class="custom-container">
            <div class="tab-content ride-content" id="TabContent">

                <div class="tab-pane fade active show" id="active-tab">

                    <ul class="my-ride-list driver-ride-list">

                        @foreach($active_rides as $active_ride)
                            @php
                                $message = $active_ride->message;
                                $badgeClass = 'badge'; // base class
                                $badgeText = '';

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
                                    <span>👤 {{ $active_ride->user->name }}</span>
                                    <span>{{ $active_ride->fare_currency }} {{ $active_ride->fare }}</span>
                                </div>
                                <div><span class="custom-label">📅 Posted on:</span> {{ $active_ride->created_at->format('M d, Y') }}</div>

                                <div class="custom-section">
                                    📦 {{ $badgeText }}
                                </div>

                                <!-- Ride Type -->
                                <div class="custom-section">
                                    <div>
                                        @php
                                            $transportName = $active_ride->mean_of_transport->name ?? '';
                                            $icon = $icons[$transportName] ?? '❓'; // default fallback
                                        @endphp
                                        <span class="custom-label">🔹 Reference Number:</span> {{ $active_ride->reference_id }}
                                    </div>
                                    <div>⏰ <span class="custom-label">Follow-up:</span> {{ \Illuminate\Support\Carbon::parse($active_ride->date_and_time_of_followup)->format('M d, Y') }}</div>
                                    <div>🔹 <span class="custom-label">Distance:</span> {{ $active_ride->distance }} km</div>


                                    @if(!empty($active_ride->departure_date))
                                        <div>📅 <span class="custom-label">Departure:</span> {{ $active_ride->departure_date }}</div>
                                    @endif

                                    @if(!empty($active_ride->arrival_date))
                                        <div>📅 <span class="custom-label">Arrival:</span> {{ $active_ride->arrival_date }}</div>
                                    @endif

                                    @if(!empty($active_ride->expiry))
                                        <div>📅 <span class="custom-label">Expiration:</span> {{ \Illuminate\Support\Carbon::parse($active_ride->expiry)->format('M d, Y') }}</div>
                                    @endif
                                </div>

                                <!-- Route -->
                                <div class="custom-section text-center">
                                    {{ $icon }} {{ $active_ride->pickup_location }} ⟶ {{ implode(', ', json_decode($active_ride->destination_location, true)) }}
                                </div>

                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('driver/chatting') }}" class="text-decoration-none">
                                            <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="tel:{{ $active_ride->driver->phone }}">📞 Call Carrier</a></li>
                                                <li><a class="dropdown-item" href="tel:{{ $active_ride->receiver_phone }}">📞 Call Receiver</a></li>
                                            </ul>
                                        </div>

                                        <a href="{{ url('user/ride-details?ride_id='.$active_ride->id) }}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>


                                <div class="text-center my-3">
                                    @if(trim($active_ride->message) === 'Accepted, waiting for support')
                                        <a href="{{ url('driver/track-ride/'. $active_ride->id) }}"
                                           class="btn btn-yellow w-100 auth-btn mt-3">GPS navigation for Parcel
                                            Pickup</a>
                                        <a href="{{url('driver/start-ride/'.$active_ride->id)}}"
                                           class="btn theme-btn w-100 mt-3">Start the Pickup of the Package</a>
                                    @endif
                                    @if(trim($active_ride->message) === 'On the way to pickup')
                                        <a href="{{ url('driver/track-ride/'. $active_ride->id) }}"
                                           class="btn btn-yellow w-100 auth-btn mt-3">GPS navigation for Parcel
                                            Pickup</a>
                                        <a href="{{url('driver/start-delivery/'.$active_ride->id)}}"
                                           class="btn theme-btn w-100 mt-3">Start the Delivery of the Package</a>
                                    @endif
                                    @if(trim($active_ride->message) === 'delivery in progress')
                                        <a href="{{ url('driver/track-ride/'. $active_ride->id) }}"
                                           class="btn btn-yellow w-100 auth-btn mt-3">GPS navigation for Parcel
                                            Delivery</a>
                                        <a href="{{url('driver/ride-complete-request/'.$active_ride->id)}}"
                                           class="btn btn-primary w-100 mt-3">Complete delivery</a>
                                    @endif

                                    @if($active_ride->status == 'carrier_cancelled_ride' || $active_ride->status == 'active')
                                        {{--                                        @if($active_ride->message != 'Parcel returned')--}}
                                        @if($active_ride->message == 'Delivery in progress, parcel return requested' || $active_ride->message == 'Carrier Cancelled Ride' || $active_ride->message == 'User Cancelled Ride')
                                            <a href="{{url('driver/start-parcel-return/'.$active_ride->id)}}"
                                               class="btn btn-warning w-100 mt-3">Start Parcel Return</a>
                                        @elseif($active_ride->message == "Package return in progress")
                                            <a href="{{ url('driver/track-ride/'. $active_ride->id) }}"
                                               class="btn btn-yellow w-100 auth-btn mt-3">GPS navigation for Parcel
                                                Return</a>
                                            <a href="{{url('driver/package-returned-request/'.$active_ride->id)}}"
                                               class="btn btn-warning w-100 mt-3">Parcel Returned</a>
                                        @elseif($active_ride->message == 'Parcel returned')
                                        @elseif(trim($active_ride->message) !== 'transport completed awaiting validation')
                                            <a href="#reasons" data-bs-toggle="offcanvas"
                                               data-id="{{ $active_ride->id }}"
                                               class="btn btn-danger w-100 mt-3 cancel_rideBtn">Cancel the Transport</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        @foreach($active_reserved_kilo_rides as $ride)
                            @php
                                $message = $ride->message;
                                $badgeClass = 'badge'; // base class
                                $badgeText = '';

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
                                    <span>👤 {{ $ride->driver->name }}</span>
                                    <span>{{ $ride->driverriderequest->price_currency }} {{ $ride->price_per_kilo }}/Kilo</span>
                                </div>
                                <div><span class="custom-label">📅 Posted on:</span> {{ $ride->created_at->format('M d, Y') }}</div>

                                <!-- Ride Type -->
                                @if(!empty($ride->driverriderequest->airline))
                                    <div class="custom-section">
                                        ✈️ I Travel - I Offer My Kilos Of Luggage For Sale
                                    </div>
                                @endif

                                @if(!empty($ride->driverriderequest->maritimes))
                                    <div class="custom-section">
                                        🚢 Reserve Your Parcel Shipments
                                    </div>
                                @endif

                                <!-- Ride Status -->
                                <div class="custom-section">
                                    📦 {{ $badgeText }}
                                </div>

                                <!-- Ride Details -->
                                <div class="custom-section">

                                    @if(!empty($ride->driverriderequest->airline))
                                        <div>🔹 <span class="custom-label">Airline:</span> {{ $ride->driverriderequest->airline }}</div>
                                    @endif

                                    @if(!empty($ride->driverriderequest->maritimes))
                                        <div>🔹 <span class="custom-label">Maritime:</span> {{ $ride->driverriderequest->maritimes }}</div>
                                    @endif

                                    <div>
                                        🔹 <span class="custom-label">Reference Number:</span> {{ $ride->reference_id }}
                                    </div>
                                    <div>⏰ <span class="custom-label">Follow-up:</span>{{ \Carbon\Carbon::parse($ride->date_and_time_of_followup)->format('M d, Y') }}</div>
                                    <div> 🔹 <span class="custom-label">Distance:</span> {{ $ride->driverriderequest->distance }} km </div>

                                    @if(!empty($ride->driverriderequest->available_transport_capacity))
                                        <div>
                                            🔹 <span class="custom-label">Available:</span> {{ $ride->driverriderequest->available_transport_capacity }} kg |
                                            <span class="custom-label">Reserved:</span> {{ $ride->driverriderequest->total_transport_capacity - $ride->driverriderequest->available_transport_capacity }} kg
                                        </div>
                                    @endif

                                    @if(!empty($ride->price_per_kilo))
                                        <div>🔹 <span class="custom-label">Price per kg:</span> {{ $ride->driverriderequest->price_currency }} {{ $ride->price_per_kilo }}</div>
                                    @endif

                                    @if(!empty($ride->driverriderequest->departure_datetime))
                                        <div>📅 <span class="custom-label">Departure:</span> {{ $ride->driverriderequest->departure_datetime->format('M d, Y H:i') }}</div>
                                    @endif

                                    @if(!empty($ride->driverriderequest->arrival_datetime))
                                        <div>📅 <span class="custom-label">Arrival:</span> {{ $ride->driverriderequest->arrival_datetime->format('M d, Y H:i') }}</div>
                                    @endif

                                    @if(!empty($ride->driverriderequest->end_reservation_date))
                                        <div>📅 <span class="custom-label">Expiration:</span> {{ $ride->driverriderequest->end_reservation_date->format('M d, Y') }}</div>
                                    @endif

                                    @if(!empty($ride->driverriderequest->package_receiving_method))
                                        <div>🛡️ <span class="custom-label">Reception:</span> {{ $ride->driverriderequest->package_receiving_method }}</div>
                                    @endif
                                </div>

                                <!-- Route -->
                                <div class="custom-section text-center">
                                    @if(!empty($ride->driverriderequest->airline))
                                        ✈️
                                    @endif

                                    @if(!empty($ride->driverriderequest->maritimes))
                                        🚢
                                    @endif
                                    {{ $ride->driverriderequest->pickup_location }} ⟶ {{ implode(', ', $ride->driverriderequest->destination_location) }}
                                </div>


                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('driver/chatting') }}" class="text-decoration-none">
                                            <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="tel:{{ $ride->driver->phone }}">📞 Call Sender</a></li>
                                                <li><a class="dropdown-item" href="tel:{{ $ride->receiver_phone }}">📞 Call Receiver</a></li>
                                            </ul>
                                        </div>

                                        <a href="{{ url('driver/reserved-kilo-ride-details?ride_id='.$ride->id) }}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>

                                <div class="text-center my-3">
                                    <a class="btn btn-warning w-100 mt-3" href="{{ url('driver/reserved-kilo-ride-details?ride_id='.$ride->id) }}">View Details</a>
                                    @if(trim($ride->message) === 'delivery in progress')
                                        {{--                                            <a href="{{ url('driver/track-ride/'. $active_ride->id) }}"--}}
                                        {{--                                               class="btn btn-yellow w-100 auth-btn mt-3">GPS navigation for Parcel--}}
                                        {{--                                                Delivery</a>--}}
                                        <a href="{{url('driver/reserved-kilo-ride-complete-request/'.$ride->id)}}"
                                           class="btn btn-primary w-100 mt-3">Complete delivery</a>
                                    @endif
                                    @if($ride->status == 'carrier_cancelled_ride' || $ride->status == 'active')
                                        {{--                                        @if($active_ride->message != 'Parcel returned')--}}
                                        @if($ride->message == 'Delivery in progress, parcel return requested' || $ride->message == 'Carrier Cancelled Ride' || $ride->message == 'User Cancelled Ride')
                                                                                            <a href="{{url('user/start-reserved-kilo-parcel-return/'.$ride->id)}}"
                                                                                               class="btn btn-warning w-100 mt-3">Start Parcel Return</a>
                                        @elseif($ride->message == "Package return in progress")
                                            <a href="{{ url('driver/reserved-kilo-track-ride/'. $ride->id) }}"
                                               class="btn btn-yellow w-100 auth-btn mt-3">GPS navigation for Parcel Return</a>
                                            <a href="{{url('driver/reserved-kilo-package-returned-request/'.$ride->id)}}"
                                               class="btn btn-warning w-100 mt-3">Parcel Returned</a>
                                        @elseif($ride->message == 'Parcel returned')
                                        @elseif(trim($ride->message) !== 'transport completed awaiting validation')
                                            <a href="#reserved_kilo_reasons_after_pickup" data-bs-toggle="offcanvas"
                                               data-id="{{ $ride->id }}"
                                               class="btn btn-danger w-100 mt-3 cancel_rideBtn">Cancel the Transport</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </ul>
                </div>

                <div class="tab-pane fade" id="pending-tab">
                    <ul class="my-ride-list driver-ride-list">
                        @foreach($pending_rides as $pending_ride)
                            <div class="custom-card">
                                    {{-- Header with user + price --}}
                                    <div class="custom-header d-flex justify-content-between">
                                        <span>👤 {{ $pending_ride->user->name ?? 'Unknown User' }}</span>
                                        <span>{{ $pending_ride->fare_currency }} {{ $pending_ride->fare }}</span>
                                    </div>

                                    {{-- Posted on --}}
                                    <div>
                                        <span class="custom-label">📅 Posted on:</span>
                                        {{ $pending_ride->created_at->format('M d, Y') }}
                                    </div>

                                <div class="custom-section">
                                    📦 {{ $pending_ride->message }}
                                </div>

                                    {{-- Flight & Details --}}
                                    <div class="custom-section">
                                        @php
                                            $locations = json_decode($pending_ride->destination_location, true);
                                        @endphp

                                        <div>🔹 <span class="custom-label">Reference Number:</span> {{ $pending_ride->reference_id }}</div>

                                        @if(!empty($pending_ride->transport_title))
                                            <div>
                                                @php
                                                    $transportName = $pending_ride->mean_of_transport->name ?? '';
                                                    $icon = $icons[$transportName] ?? '❓'; // default fallback
                                                @endphp
                                                {{ $icon }} {{ $pending_ride->transport_title }}
                                            </div>
                                        @endif

                                        @if(!empty($pending_ride->expiry))
                                            <div>📅 <span class="custom-label">Expiration:</span> {{ $pending_ride->expiry }}</div>
                                        @endif
                                    </div>

                                    {{-- Route --}}
                                    <div class="custom-section text-center">
                                        {{ $icon }} {{ $pending_ride->pickup_location ?? 'Unknown' }}
                                        @if(!empty($locations) && count($locations) > 0)
                                            ⟶ {{ implode(', ', $locations) }}
                                        @endif
                                    </div>

                                <!-- Contact & Details -->
                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('user/chatting') }}" class="text-decoration-none">
                                            <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="tel:{{ $pending_ride->user->phone }}">📞 Call Carrier</a></li>
                                                <li><a class="dropdown-item" href="tel:{{ $pending_ride->receiver_phone }}">📞 Call Receiver</a></li>
                                            </ul>
                                        </div>

                                        <a href="{{ url('user/ride-details?ride_id='.$pending_ride->id) }}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>

                                    {{-- Actions --}}
                                    <div class="text-center my-3">
                                        <a href="{{ url('driver/start-ride/'.$pending_ride->id) }}" class="btn btn-success w-100 mb-2">
                                            ✅ Start the Collection of the Package
                                        </a>
                                        <a href="#reasons" data-bs-toggle="offcanvas" data-id="{{ $pending_ride->id }}"
                                           class="btn btn-danger w-100 cancel_rideBtn">
                                            🔴 Cancel Transport
                                        </a>
                                    </div>
                                </div>
                        @endforeach
                            @foreach($pending_reserved_kilo_rides as $pending_reserved_kilo_ride)
                                <div class="custom-card">
                                        {{-- Header: Driver + Price --}}
                                        <div class="custom-header d-flex justify-content-between">
                                            <span>👤 {{ $pending_reserved_kilo_ride->driver->name ?? 'Unknown Driver' }}</span>
                                            <span>{{ $pending_reserved_kilo_ride->driverriderequest->price_currency }} {{ $pending_reserved_kilo_ride->price_per_kilo }}/kg</span>
                                        </div>

                                        {{-- Posted On --}}
                                        <div>
                                            <span class="custom-label">📅 Posted on:</span>
                                            {{ $pending_reserved_kilo_ride->created_at->format('M d, Y') }}
                                        </div>

                                        {{-- Ride Type --}}
                                        @if(!empty($pending_reserved_kilo_ride->driverriderequest->airline))
                                            <div class="custom-section">
                                                ✈️
                                                I Travel - I Offer My Kilos Of Luggage For Sale
                                            </div>
                                        @endif

                                        @if(!empty($pending_reserved_kilo_ride->driverriderequest->maritimes))
                                            <div class="custom-section">
                                                🚢 Reserve Your Parcel Shipments
                                            </div>
                                        @endif

                                        {{-- Ride Message --}}
                                        <div class="custom-section">
                                            📦 {{ $pending_reserved_kilo_ride->message }}
                                        </div>

                                        {{-- Flight & Details --}}
                                        <div class="custom-section">
                                            @php
                                                $request = $pending_reserved_kilo_ride->driverriderequest;
                                            @endphp

                                            @if($request->airline)
                                                <div>🔹 <span class="custom-label">Travel Company:</span> {{ $request->airline }}</div>
                                            @endif

                                            @if($request->maritimes)
                                                <div>🔹 <span class="custom-label">Travel Company:</span> {{ $request->maritimes }}</div>
                                            @endif
                                            <div>
                                                🔹 <span class="custom-label">Reference Number:</span> {{ $pending_reserved_kilo_ride->reference_id }}
                                            </div>
                                            <div>
                                                🔹 <span class="custom-label">Available Capacity:</span> {{ $request->available_transport_capacity }} kg
                                            </div>
                                            <div>
                                                🔹 <span class="custom-label">Reserved Kilos:</span>
                                                {{ $request->total_transport_capacity - $request->available_transport_capacity }}
                                            </div>

                                            <div>📅 <span class="custom-label">Departure:</span> {{ $request->departure_datetime->format('M d, Y H:i') }}</div>
                                            @if($request->arrival_datetime)
                                                <div>📅 <span class="custom-label">Arrival:</span> {{ $request->arrival_datetime->format('M d, Y H:i') }}</div>
                                            @endif
                                            @if($request->end_reservation_date)
                                                <div>📅 <span class="custom-label">Expiration:</span> {{ $request->end_reservation_date->format('M d, Y H:i') }}</div>
                                            @endif

                                            @if($request->package_receiving_method)
                                                <div>🛡️ <span class="custom-label">Reception:</span> {{ $request->package_receiving_method }}</div>
                                            @endif
                                        </div>

                                        {{-- Route --}}
                                        <div class="custom-section text-center">
                                            @if(!empty($pending_reserved_kilo_ride->driverriderequest->airline))
                                                ✈️
                                            @endif

                                            @if(!empty($pending_reserved_kilo_ride->driverriderequest->maritimes))
                                                🚢
                                            @endif
                                            {{ $request->pickup_location ?? 'Unknown' }}
                                            @if(!empty($request->destination_location))
                                                ⟶ {{ implode(', ', $request->destination_location) }}
                                            @endif
                                        </div>

                                        <!-- Contact & Details -->
                                        <div class="custom-footer d-flex justify-content-between align-items-center">
                                            <div class="d-flex gap-2">
                                                <a href="{{ url('user/chatting') }}" class="text-decoration-none">
                                                    <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                                </a>

                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="tel:{{ $pending_reserved_kilo_ride->user->phone }}">📞 Call Sender</a></li>
                                                        <li><a class="dropdown-item" href="tel:{{ $pending_reserved_kilo_ride->receiver_phone }}">📞 Call Receiver</a></li>
                                                    </ul>
                                                </div>

                                                <a href="{{ url('driver/reserved-kilo-ride-details?ride_id='.$pending_reserved_kilo_ride->id) }}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>

                                        {{-- Actions --}}
                                        <div class="text-center my-3">
                                            @if($pending_reserved_kilo_ride->message == 'Package Collected Requested')
                                                <a href="{{ url('driver/confirm-package-collected/'. $pending_reserved_kilo_ride->id) }}"
                                                   class="btn btn-warning w-100 mb-2">✅ Confirm Package Collected</a>
                                            @endif

                                            @if($pending_reserved_kilo_ride->message == 'Package Collected')
                                                <a href="{{ url('driver/start-reserved-kilo-ride/'.$pending_reserved_kilo_ride->id) }}"
                                                   class="btn btn-success w-100 mb-2">🚚 Start the Delivery</a>
                                            @endif

                                            <a href="#reserved_kilo_reasons_before_pickup" data-bs-toggle="offcanvas" data-id="{{ $pending_reserved_kilo_ride->id }}"
                                               class="btn btn-danger w-100 cancel_rideBtn">
                                                🔴 Cancel the Transport
                                            </a>
                                        </div>
                                    </div>
                            @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="pending_offers-tab">
                    <ul class="my-ride-list driver-ride-list">
                        @forelse($pending_offers as $pending_offer)
                            <div class="custom-card">
                                    {{-- Header: Driver + Price --}}
                                    <div class="custom-header d-flex justify-content-between align-items-center">
                                        <span>👤 {{ $pending_offer->driver->name ?? 'Unknown Driver' }}</span>
                                        <span>{{ $pending_offer->price_currency }} {{ $pending_offer->price_per_kilo }}/kg</span>
                                    </div>

                                    {{-- Posted On --}}
                                    <div>
                                        <span class="custom-label">📅 Posted on:</span>
                                        {{ $pending_offer->created_at->format('M d, Y') }}
                                    </div>

                                <!-- Ride Type -->
                                @if(!empty($pending_offer->airline))
                                    <div class="custom-section">
                                        ✈️ I Travel - I Offer My Kilos Of Luggage For Sale
                                    </div>
                                @endif

                                @if(!empty($pending_offer->maritimes))
                                    <div class="custom-section">
                                        🚢 Reserve Your Parcel Shipments
                                    </div>
                                @endif

                                <div class="custom-section">
                                    📦 {{ $pending_offer->status == 'waiting' ? 'booking in progress' : $pending_offer->status }}
                                </div>

                                    @if($pending_offer->airline)
                                        <div>🔹 <span class="custom-label">Travel Company:</span> {{ $pending_offer->airline }}</div>
                                    @endif
                                    @if($pending_offer->maritimes)
                                        <div>🔹 <span class="custom-label">Travel Company:</span> {{ $pending_offer->maritimes }}</div>
                                    @endif

                                <div class="row align-items-center">
                                    <!-- Left side: Offer Details -->
                                    <div class="col-md-9 col-sm-8">

                                    {{-- Ride Details --}}

                                        <div>🔹 <span class="custom-label">Reference Number:</span> {{ $pending_offer->reference_id }}</div>
                                        <div>🔹 <span class="custom-label">Total Kilo:</span> {{ $pending_offer->total_transport_capacity }} kg</div>
                                        <div>🔹 <span class="custom-label">Available Kilo:</span> {{ $pending_offer->available_transport_capacity }} kg</div>
                                        <div>🔹 <span class="custom-label">Reserved Kilos:</span> {{ $pending_offer->total_transport_capacity - $pending_offer->available_transport_capacity }}</div>

                                        <div>
                                            📅 <span class="custom-label">Departure:</span>
                                            <input type="datetime-local"
                                                   value="{{ $pending_offer->departure_datetime->format('Y-m-d\TH:i') }}"
                                                   class="form-control form-control-sm update-datetime"
                                                   data-id="{{ $pending_offer->id }}"
                                                   data-field="departure_datetime">
                                        </div>

                                        @if($pending_offer->arrival_datetime)
                                            <div>
                                                📅 <span class="custom-label">Arrival:</span>
                                                <input type="datetime-local"
                                                       value="{{ $pending_offer->arrival_datetime->format('Y-m-d\TH:i') }}"
                                                       class="form-control form-control-sm update-datetime"
                                                       data-id="{{ $pending_offer->id }}"
                                                       data-field="arrival_datetime">
                                            </div>
                                        @endif

                                        @if($pending_offer->end_reservation_date)
                                            <div>
                                                📅 <span class="custom-label">Expiry:</span>
                                                <input type="datetime-local"
                                                       value="{{ $pending_offer->end_reservation_date->format('Y-m-d\TH:i') }}"
                                                       class="form-control form-control-sm update-datetime"
                                                       data-id="{{ $pending_offer->id }}"
                                                       data-field="end_reservation_date">
                                            </div>
                                        @endif

                                        @if($pending_offer->package_receiving_method)
                                            <div>🛡️ <span class="custom-label">Reception:</span> {{ $pending_offer->package_receiving_method }}</div>
                                        @endif

                                    </div>

                                    @php
                                    $reserved_kilo = $pending_offer->total_transport_capacity - $pending_offer->available_transport_capacity;
                                    $progress = ($reserved_kilo/$pending_offer->total_transport_capacity) * 100;
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

                                    {{-- Route --}}
                                    <div class="custom-section text-center">
                                        @if(!empty($pending_offer->airline))
                                            ✈️
                                        @endif

                                        @if(!empty($pending_offer->maritimes))
                                            🚢
                                        @endif
                                        {{ $pending_offer->pickup_location ?? 'Unknown' }}
                                        @if(!empty($pending_offer->destination_location))
                                            ⟶ {{ implode(', ', $pending_offer->destination_location) }}
                                        @endif
                                    </div>

                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('driver/user-fare-requests?id='.$pending_offer->id) }}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View User Requests" width="30px" alt="loading">
                                        </a>

                                    </div>
                                </div>

                                    {{-- Footer / Actions --}}
                                <div class="text-center my-3">
                                        <a href="{{ url('driver/user-fare-requests?id='.$pending_offer->id) }}" class="btn btn-warning flex-grow-1 me-1 w-100 mb-2">View User Requests</a>
                                    <div class="d-flex w-100 mb-2">
                                        <a href="#offers" data-bs-toggle="offcanvas" data-id="{{ $pending_offer->id }}"
                                           class="btn btn-danger flex-grow-1 me-1 cancel_offerBtn">
                                            Cancel Offer
                                        </a>
                                        @if($pending_offer->is_booking_closed == false)
                                            <a href="{{ url('driver/update-booking/'.$pending_offer->id) }}" class="btn btn-danger flex-grow-1 ms-1">
                                                Close Booking
                                            </a>
                                        @endif
                                    </div>
                                    </div>
                                </div>
                        @empty
                            <p>No Pending Offers Available.</p>
                        @endforelse

                    </ul>
                </div>

                <div class="tab-pane fade" id="personal_offers-tab">
                    <ul class="my-ride-list driver-ride-list" id="userRideList">
                        @forelse($personal_offers as $personal_offer)
                            <div class="custom-card">
                                    {{-- Header: User + Fare --}}
                                    <div class="custom-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="#" class="my-ride-img">
                                                <img class="img-fluid profile-img"
                                                     style="border-radius: 50%; width:40px; height:40px; object-fit:cover;"
                                                     src="{{ $personal_offer->user->profile ? asset('storage/'.$personal_offer->user->profile) : asset('assets/images/profile/p5.png') }}"
                                                     alt="profile">
                                            </a>
                                            <span>👤 {{ $personal_offer->user->name ?? 'Unknown User' }}</span>
                                        </div>
                                        <span>{{ $personal_offer->fare_currency }} {{ $personal_offer->fare }}</span>
                                    </div>

                                    {{-- Posted on --}}
                                    <div>
                                        <span class="custom-label">📅 Posted on:</span>
                                        {{ $personal_offer->created_at->format('M d, Y') }}
                                    </div>

                                <div class="custom-section text-center">
                                    <span class="badge badge-info">{{ $personal_offer->status }}</span>
                                </div>

                                    {{-- Ride Title --}}
                                    <div class="custom-section">
                                        <div>🚚 <span class="custom-label">Transport:</span> {{ $personal_offer->transport_title }}</div>
                                        <div>🚚 <span class="custom-label">Reference Number:</span> {{ $personal_offer->reference_id }}</div>
                                        <div>🔹 <span class="custom-label">Distance:</span> {{ $personal_offer->distance }} km</div>
                                        <div>📅 <span class="custom-label">Expiry:</span> {{ \Carbon\Carbon::parse($personal_offer->expiry)->format('M d, Y') }}</div>
                                    </div>

                                    {{-- Route --}}
                                    <div class="custom-section text-center">
                                        @if(!empty($ride->driverriderequest->airline))
                                            ✈️
                                        @endif

                                        @if(!empty($ride->driverriderequest->maritimes))
                                            🚢
                                        @endif
                                        {{ $personal_offer->pickup_location ?? 'Unknown' }}
                                        @php
                                            $locations = json_decode($personal_offer->destination_location, true);
                                        @endphp
                                        @if(!empty($locations) && count($locations) > 0)
                                            ⟶ {{ implode(', ', $locations) }}
                                        @endif
                                    </div>

                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('driver/chatting') }}" class="text-decoration-none">
                                            <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="tel:{{ $personal_offer->user->phone }}">📞 Call Sender</a></li>
                                                <li><a class="dropdown-item" href="tel:{{ $personal_offer->receiver_phone }}">📞 Call Receiver</a></li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('driver.accept_ride',['id'=>$personal_offer->id]) }}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View details and negotiate" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>

                                    {{-- Footer: Actions --}}
                                <div class="text-center my-3">
                                        <a href="{{ route('driver.accept_ride',['id'=>$personal_offer->id]) }}" class="btn theme-btn w-100">
                                            View details and negotiate
                                        </a>

                                        @php
                                            $text = 'Send a transport request';
                                            if (\Illuminate\Support\Facades\Auth::guard('driver')->check()){
                                                $driver_request = \App\Models\Driverfarerequest::where('driver_id', \Illuminate\Support\Facades\Auth::guard('driver')->user()->id)
                                                    ->where('userriderequest_id', $personal_offer->id)->orderBy('id','desc')->first();
                                                if ($driver_request && $driver_request->status == 'waiting'){
                                                    $text = 'Transport Request Sent';
                                                }
                                            }
                                        @endphp

                                        <form method="post" action="{{ url('driver/request-fare') }}">
                                            @csrf
                                            <input type="hidden" name="driver_location_latitude" id="driver_location_latitude">
                                            <input type="hidden" name="driver_location_longitude" id="driver_location_longitude">
                                            <button type="submit" class="btn theme-btn w-100 accept-fare-btn"
                                                    data-userriderequest_id="{{ $personal_offer->id }}"
                                                    data-requested_fare="{{ $personal_offer->fare }}">
                                                {{ $text }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                        @empty
                            <p>No Personal Ride Offers Available.</p>
                        @endforelse
                    </ul>
                </div>

                <div class="tab-pane fade" id="complete-tab">
                    <ul class="my-ride-list driver-ride-list">
                        @foreach($completed_rides as $completed_ride)
                                <div class="custom-card">
                                    {{-- Header: User + Fare --}}
                                    <div class="custom-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-2">
                                            <span>👤 {{ $completed_ride->user->name ?? 'Unknown User' }}</span>
                                        </div>
                                        <span>{{ $completed_ride->fare_currency }} {{ $completed_ride->fare }}</span>
                                    </div>

                                    {{-- Posted On --}}
                                    <div>
                                        <span class="custom-label">📅 Posted on:</span>
                                        {{ $completed_ride->created_at->format('M d, Y') }}
                                    </div>

                                    {{-- Ride Details --}}
                                    <div class="custom-section">
                                        <div>
                                            @php
                                                $transportName = $completed_ride->mean_of_transport->name ?? '';
                                                $icon = $icons[$transportName] ?? '❓'; // default fallback
                                            @endphp
                                            {{ $icon }} <span class="custom-label">Title:</span> {{ $completed_ride->transport_title }}
                                        </div>
                                        <div>📏 <span class="custom-label">Reference Number:</span> {{ $completed_ride->reference_id }}</div>
                                        <div>📏 <span class="custom-label">Distance:</span> {{ $completed_ride->distance }} km</div>
                                        <div>📅 <span class="custom-label">Follow-up:</span> {{ \Illuminate\Support\Carbon::parse($completed_ride->date_and_time_of_followup)->format('M d, Y') }}</div>
                                    </div>

                                    {{-- Route --}}
                                    <div class="custom-section text-center">
                                        {{ $icon }} {{ $completed_ride->pickup_location }}
                                        @php
                                            $locations = json_decode($completed_ride->destination_location, true);
                                        @endphp
                                        @if(!empty($locations))
                                            ⟶ {{ implode(', ', $locations) }}
                                        @endif
                                    </div>

                                    {{-- Footer / Actions --}}
                                    <div class="custom-footer d-flex justify-content-between align-items-center">
                                        <div class="d-flex gap-2">
                                            <a href="{{url('driver/chatting')}}" class="text-decoration-none">
                                                <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                            </a>

                                            <div class="dropdown">
                                                <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="tel:{{ $completed_ride->user->phone }}">📞 Call Sender</a></li>
                                                    <li><a class="dropdown-item" href="tel:{{ $completed_ride->receiver_phone }}">📞 Call Receiver</a></li>
                                                </ul>
                                            </div>

                                            <a href="{{url('user/ride-details?ride_id='.$completed_ride->id)}}">
                                                <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach

                            @foreach($completed_reserved_kilo_rides as $completed_reserved_kilo_ride)
                                    <div class="custom-card">
                                        {{-- Header: User + Price --}}
                                        <div class="custom-header d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center gap-2">
                                                <span>👤 {{ $completed_reserved_kilo_ride->user->name }}</span>
                                            </div>
                                            <span>{{ $completed_reserved_kilo_ride->driverriderequest->price_currency }}{{ $completed_reserved_kilo_ride->price_per_kilo }}/Kilo</span>
                                        </div>

                                        {{-- Posted On / Follow-up Date --}}
                                        <div>
                                            <span class="custom-label">📅 Posted on:</span>
                                            {{ \Carbon\Carbon::parse($completed_reserved_kilo_ride->created_at)->format('M d, Y') }}
                                        </div>

                                        {{-- Ride Type / Badge --}}
                                        @if(!empty($completed_reserved_kilo_ride->driverriderequest->airline))
                                            <div class="custom-section">
                                                ✈️ I Travel - I Offer My Kilos Of Luggage For Sale
                                            </div>
                                        @endif

                                        @if(!empty($completed_reserved_kilo_ride->driverriderequest->maritimes))
                                            <div class="custom-section">
                                                🚢 Reserve Your Parcel Shipments
                                            </div>
                                        @endif

                                        {{-- Ride Details --}}
                                        <div class="custom-section">
                                            <div>
                                                <span class="custom-label">📅  Follow-up:</span>
                                                {{ \Carbon\Carbon::parse($completed_reserved_kilo_ride->date_and_time_of_followup)->format('M d, Y') }}
                                            </div>
                                            <div>
                                                <span class="custom-label">📏  Distance:</span>
                                                {{ $completed_reserved_kilo_ride->driverriderequest->distance }} Km
                                            </div>
                                            @if($completed_reserved_kilo_ride->driverriderequest->airline)
                                                <div>🔹 <span class="custom-label">Travel Company:</span> {{ $completed_reserved_kilo_ride->driverriderequest->airline }}</div>
                                            @endif
                                            @if($completed_reserved_kilo_ride->driverriderequest->maritimes)
                                                <div>🔹 <span class="custom-label">Travel Company:</span> {{ $completed_reserved_kilo_ride->driverriderequest->maritimes }}</div>
                                            @endif
                                            <div>🔹 <span class="custom-label">Reserved Kilos:</span>
                                                {{ $completed_reserved_kilo_ride->driverriderequest->total_transport_capacity - $completed_reserved_kilo_ride->driverriderequest->available_transport_capacity }}
                                            </div>
                                            <div>📅 <span class="custom-label">Departure:</span> {{ $completed_reserved_kilo_ride->driverriderequest->departure_datetime->format('M d, Y H:i') }}</div>
                                            <div>📅 <span class="custom-label">Arrival:</span> {{ $completed_reserved_kilo_ride->driverriderequest->arrival_datetime?->format('M d, Y H:i') }}</div>
                                            <div>📅 <span class="custom-label">Expiry:</span> {{ $completed_reserved_kilo_ride->driverriderequest->end_reservation_date?->format('M d, Y H:i') }}</div>
                                            <div>🛡️ <span class="custom-label">Reception Method:</span> {{ $completed_reserved_kilo_ride->driverriderequest->package_receiving_method }}</div>
                                        </div>

                                        {{-- Route --}}
                                        <div class="custom-section text-center">
                                            @if(!empty($completed_reserved_kilo_ride->driverriderequest->airline))
                                                ✈️
                                            @endif

                                            @if(!empty($completed_reserved_kilo_ride->driverriderequest->maritimes))
                                                🚢
                                            @endif
                                            {{ $completed_reserved_kilo_ride->driverriderequest->pickup_location }}
                                            @if(!empty($completed_reserved_kilo_ride->driverriderequest->destination_location))
                                                ⟶ {{ implode(', ', $completed_reserved_kilo_ride->driverriderequest->destination_location) }}
                                            @endif
                                        </div>

                                        <div class="custom-footer d-flex justify-content-between align-items-center">
                                            <div class="d-flex gap-2">
                                                <a href="{{url('driver/chatting')}}" class="text-decoration-none">
                                                    <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                                </a>

                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="tel:{{ $completed_reserved_kilo_ride->user->phone }}">📞 Call Sender</a></li>
                                                        <li><a class="dropdown-item" href="tel:{{ $completed_reserved_kilo_ride->receiver_phone }}">📞 Call Receiver</a></li>
                                                    </ul>
                                                </div>

                                                <a href="{{url('driver/reserved-kilo-ride-details?ride_id='.$completed_reserved_kilo_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                            @endforeach

                    </ul>
                </div>

                <div class="tab-pane fade" id="cancel-tab">
                    <ul class="my-ride-list driver-ride-list">
                            @foreach($cancelled_rides as $cancelled_ride)
                                <div class="custom-card">
                                    {{-- Header: User + Fare --}}
                                    <div class="custom-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-2">
                                            <span>👤 {{ $cancelled_ride->user->name ?? 'Unknown User' }}</span>
                                        </div>
                                        <span>{{ $cancelled_ride->fare_currency }} {{ $cancelled_ride->fare }}</span>
                                    </div>

                                    {{-- Posted On --}}
                                    <div>
                                        <span class="custom-label">📅 Posted on:</span>
                                        {{ $cancelled_ride->created_at->format('M d, Y') }}
                                    </div>

                                    {{-- Ride Details --}}
                                    <div class="custom-section">
                                        <div>
                                            @php
                                                $transportName = $cancelled_ride->mean_of_transport->name ?? '';
                                                $icon = $icons[$transportName] ?? '❓'; // default fallback
                                            @endphp
                                            {{ $icon }} <span class="custom-label">Title:</span> {{ $cancelled_ride->transport_title }}
                                        </div>
                                        <div>📏 <span class="custom-label">Distance:</span> {{ $cancelled_ride->distance }} km</div>
                                        <div>📏 <span class="custom-label">Reference Number:</span> {{ $cancelled_ride->reference_id }}</div>
                                        <div>📅 <span class="custom-label">Follow-up:</span> {{ \Illuminate\Support\Carbon::parse($cancelled_ride->date_and_time_of_followup)->format('M d, Y') }}</div>
                                    </div>

                                    {{-- Route --}}
                                    <div class="custom-section text-center">
                                        ✈️ {{ $cancelled_ride->pickup_location }}
                                        @php
                                            $locations = json_decode($cancelled_ride->destination_location, true);
                                        @endphp
                                        @if(!empty($locations))
                                            ⟶ {{ implode(', ', $locations) }}
                                        @endif
                                    </div>

                                    {{-- Footer / Actions --}}
                                    <div class="custom-footer d-flex justify-content-between align-items-center">
                                        <div class="d-flex gap-2">
                                            <a href="{{url('driver/chatting')}}" class="text-decoration-none">
                                                <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                            </a>

                                            <div class="dropdown">
                                                <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="tel:{{ $cancelled_ride->user->phone }}">📞 Call Sender</a></li>
                                                    <li><a class="dropdown-item" href="tel:{{ $cancelled_ride->receiver_phone }}">📞 Call Receiver</a></li>
                                                </ul>
                                            </div>

                                            <a href="{{url('user/ride-details?ride_id='.$cancelled_ride->id)}}">
                                                <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                                @foreach($cancelled_reserved_kilo_rides as $cancelled_reserved_kilo_ride)
                                    <div class="custom-card">
                                        {{-- Header: User + Price --}}
                                        <div class="custom-header d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center gap-2">
                                                <span>👤 {{ $cancelled_reserved_kilo_ride->user->name }}</span>
                                            </div>
                                            <span>{{ $cancelled_reserved_kilo_ride->driverriderequest->price_currency }}{{ $cancelled_reserved_kilo_ride->price_per_kilo }}/Kilo</span>
                                        </div>

                                        {{-- Posted On / Follow-up Date --}}
                                        <div>
                                            <span class="custom-label">📅 Posted on:</span>
                                            {{ \Carbon\Carbon::parse($cancelled_reserved_kilo_ride->created_at)->format('M d, Y') }}
                                        </div>

                                        {{-- Ride Type / Badge --}}
                                        @if(!empty($cancelled_reserved_kilo_ride->driverriderequest->airline))
                                            <div class="custom-section">
                                                ✈️ I Travel - I Offer My Kilos Of Luggage For Sale
                                            </div>
                                        @endif

                                        @if(!empty($cancelled_reserved_kilo_ride->driverriderequest->maritimes))
                                            <div class="custom-section">
                                                🚢 Reserve Your Parcel Shipments
                                            </div>
                                        @endif

                                        {{-- Ride Details --}}
                                        <div class="custom-section">
                                            <div>
                                                <span class="custom-label">📅  Follow-up:</span>
                                                {{ \Carbon\Carbon::parse($cancelled_reserved_kilo_ride->date_and_time_of_followup)->format('M d, Y') }}
                                            </div>
                                            <div>
                                                <span class="custom-label">📏  Distance:</span>
                                                {{ $cancelled_reserved_kilo_ride->driverriderequest->distance }} Km
                                            </div>
                                            @if($cancelled_reserved_kilo_ride->driverriderequest->airline)
                                                <div>🔹 <span class="custom-label">Travel Company:</span> {{ $cancelled_reserved_kilo_ride->driverriderequest->airline }}</div>
                                            @endif
                                            @if($cancelled_reserved_kilo_ride->driverriderequest->maritimes)
                                                <div>🔹 <span class="custom-label">Travel Company:</span> {{ $cancelled_reserved_kilo_ride->driverriderequest->maritimes }}</div>
                                            @endif
                                            <div>🔹 <span class="custom-label">Reserved Kilos:</span>
                                                {{ $cancelled_reserved_kilo_ride->driverriderequest->total_transport_capacity - $cancelled_reserved_kilo_ride->driverriderequest->available_transport_capacity }}
                                            </div>
                                            <div>📅 <span class="custom-label">Departure:</span> {{ $cancelled_reserved_kilo_ride->driverriderequest->departure_datetime->format('M d, Y H:i') }}</div>
                                            <div>📅 <span class="custom-label">Arrival:</span> {{ $cancelled_reserved_kilo_ride->driverriderequest->arrival_datetime?->format('M d, Y H:i') }}</div>
                                            <div>📅 <span class="custom-label">Expiry:</span> {{ $cancelled_reserved_kilo_ride->driverriderequest->end_reservation_date?->format('M d, Y H:i') }}</div>
                                            <div>🛡️ <span class="custom-label">Reception Method:</span> {{ $cancelled_reserved_kilo_ride->driverriderequest->package_receiving_method }}</div>
                                        </div>

                                        {{-- Route --}}
                                        <div class="custom-section text-center">
                                            @if(!empty($cancelled_reserved_kilo_ride->driverriderequest->airline))
                                                ✈️
                                            @endif

                                            @if(!empty($cancelled_reserved_kilo_ride->driverriderequest->maritimes))
                                                🚢
                                            @endif
                                            {{ $cancelled_reserved_kilo_ride->driverriderequest->pickup_location }}
                                            @if(!empty($cancelled_reserved_kilo_ride->driverriderequest->destination_location))
                                                ⟶ {{ implode(', ', $cancelled_reserved_kilo_ride->driverriderequest->destination_location) }}
                                            @endif
                                        </div>

                                        <div class="custom-footer d-flex justify-content-between align-items-center">
                                            <div class="d-flex gap-2">
                                                <a href="{{url('driver/chatting')}}" class="text-decoration-none">
                                                    <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                                </a>

                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="tel:{{ $cancelled_reserved_kilo_ride->user->phone }}">📞 Call Sender</a></li>
                                                        <li><a class="dropdown-item" href="tel:{{ $cancelled_reserved_kilo_ride->receiver_phone }}">📞 Call Receiver</a></li>
                                                    </ul>
                                                </div>

                                                <a href="{{url('driver/reserved-kilo-ride-details?ride_id='.$cancelled_reserved_kilo_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- my ride section end -->

    <!-- reasons offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="reasons">
        <div class="offcanvas-body p-0">
            <div class="alert-part">
                <div class="title-content">
                    <h3 class="justify-content-center">Why do you want to cancel?</h3>
                </div>

                <form class="theme-form mt-0" action="{{url('driver/cancel-ride')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" class="offer_id">
                    <input type="hidden" name="is_user_cancelled" value="false">
                    <ul class="reasons-list">
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed01">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/user-cross.svg')}}"
                                         alt="user-cross"> User Unavailable</label>
                                <input class="form-check-input" type="radio" name="reason" value="User Unavailable"
                                       id="fixed01">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed03">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/security-time.svg')}}"
                                         alt="security"> Package Error</label>
                                <input class="form-check-input" type="radio" name="reason" value="Package Error"
                                       id="fixed03">
                            </div>
                        </li>
                    </ul>
                    <div class="mt-5">
                        <a href="{{url('driver/my-rides')}}" class="btn theme-btn w-100 mt-0">Close</a>
                        <button type="submit" class="btn theme-btn w-100 mt-1">Cancel Transport</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- reasons offcanvas end -->

    <!-- reserved kilo reasons offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="reserved_kilo_reasons_before_pickup">
        <div class="offcanvas-body p-0">
            <div class="alert-part">
                <div class="title-content">
                    <h3 class="justify-content-center">Why do you want to cancel?</h3>
                </div>

                <form class="theme-form mt-0" action="{{url('driver/cancel-reserved-kilo-ride')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" class="offer_id">
                    <input type="hidden" name="is_user_cancelled" value="false">
                    <ul class="reasons-list">
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed01">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/user-cross.svg')}}"
                                         alt="user-cross"> Modification / cancellation of my trip</label>
                                <input class="form-check-input" type="radio" name="reason" value="Modification / cancellation of my trip"
                                       id="fixed01">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed03">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/security-time.svg')}}"
                                         alt="security"> Delay or unforeseen transport (plane, train, car, etc.)</label>
                                <input class="form-check-input" type="radio" name="reason" value="Delay or unforeseen transport (plane, train, car, etc.)"
                                       id="fixed03">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed01">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/user-cross.svg')}}"
                                         alt="user-cross"> Delay or unforeseen transport (plane, train, car, etc.)</label>
                                <input class="form-check-input" type="radio" name="reason" value="Delay or unforeseen transport (plane, train, car, etc.)"
                                       id="fixed01">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed03">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/security-time.svg')}}"
                                         alt="security"> Personal or health problem</label>
                                <input class="form-check-input" type="radio" name="reason" value="Personal or health problem"
                                       id="fixed03">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed01">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/user-cross.svg')}}"
                                         alt="user-cross"> Missing documents or authorizations (visa, identity papers, customs)</label>
                                <input class="form-check-input" type="radio" name="reason" value="Missing documents or authorizations (visa, identity papers, customs)"
                                       id="fixed01">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed03">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/security-time.svg')}}"
                                         alt="security"> Reduced or overloaded baggage space</label>
                                <input class="form-check-input" type="radio" name="reason" value="Reduced or overloaded baggage space"
                                       id="fixed03">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed01">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/user-cross.svg')}}"
                                         alt="user-cross"> Refusal of the goods (prohibited, dangerous package, not in accordance with the announcement)</label>
                                <input class="form-check-input" type="radio" name="reason" value="Missing documents or authorizations (visa, identity papers, customs)"
                                       id="fixed01">
                            </div>
                        </li>
                    </ul>
                    <div class="mt-5">
                        <a href="{{url('driver/my-rides')}}" class="btn theme-btn w-100 mt-0">Close</a>
                        <button type="submit" class="btn theme-btn w-100 mt-1">Cancel Transport</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- reserved kilo reasons offcanvas end -->

    <!-- reserved kilo reasons offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="reserved_kilo_reasons_after_pickup">
        <div class="offcanvas-body p-0">
            <div class="alert-part">
                <div class="title-content">
                    <h3 class="justify-content-center">Why do you want to cancel?</h3>
                </div>

                <form class="theme-form mt-0" action="{{url('driver/cancel-reserved-kilo-ride')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" class="offer_id">
                    <input type="hidden" name="is_user_cancelled" value="false">
                    <ul class="reasons-list">
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed01">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/user-cross.svg')}}"
                                         alt="user-cross"> Package not in accordance with the description (size, weight, contents)</label>
                                <input class="form-check-input" type="radio" name="reason" value="Package not in accordance with the description (size, weight, contents)"
                                       id="fixed01">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed03">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/security-time.svg')}}"
                                         alt="security">  Dangerous, prohibited or suspicious content discovered during delivery</label>
                                <input class="form-check-input" type="radio" name="reason" value=" Dangerous, prohibited or suspicious content discovered during delivery"
                                       id="fixed03">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed01">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/user-cross.svg')}}"
                                         alt="user-cross"> Sender does not provide the necessary documents (invoice, customs, proof of value)</label>
                                <input class="form-check-input" type="radio" name="reason" value="Sender does not provide the necessary documents (invoice, customs, proof of value)"
                                       id="fixed01">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed03">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/security-time.svg')}}"
                                         alt="security"> Sender absent or too late for the appointment</label>
                                <input class="form-check-input" type="radio" name="reason" value="Sender absent or too late for the appointment"
                                       id="fixed03">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed01">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/user-cross.svg')}}"
                                         alt="user-cross"> Payment problem / reservation not confirmed</label>
                                <input class="form-check-input" type="radio" name="reason" value="Payment problem / reservation not confirmed"
                                       id="fixed01">
                            </div>
                        </li>
                    </ul>
                    <div class="mt-5">
                        <a href="{{url('driver/my-rides')}}" class="btn theme-btn w-100 mt-0">Close</a>
                        <button type="submit" class="btn theme-btn w-100 mt-1">Cancel Transport</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- reserved kilo reasons offcanvas end -->

    <!-- reasons offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="offers">
        <div class="offcanvas-body p-0">
            <div class="alert-part">
                <div class="title-content">
                    <h3 class="justify-content-center">Why do you want to cancel?</h3>
                </div>

                <form class="theme-form mt-0" action="{{url('driver/cancel-driver-ride-request')}}" method="post">
                    @csrf
                    <input type="hidden" name="driver_ride_request_id" class="offer_id">
                    <ul class="reasons-list">
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed01">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/user-cross.svg')}}"
                                         alt="user-cross"> Recipient Unavailable</label>
                                <input class="form-check-input" type="radio" name="reason" value="Recipient Unavailable"
                                       id="fixed01">
                            </div>
                        </li>
                        <li class="reasons-box">
                            <div class="form-check">
                                <label class="form-check-label" for="fixed03">
                                    <img class="img-fluid reasons-icon"
                                         src="{{asset('assets/images/svg/security-time.svg')}}"
                                         alt="security"> Package Error</label>
                                <input class="form-check-input" type="radio" name="reason" value="Package Error"
                                       id="fixed03">
                            </div>
                        </li>
                    </ul>
                    <div class="mt-5">
                        <a href="{{url('driver/my-rides')}}" class="btn theme-btn w-100 mt-0">Close</a>
                        <button type="submit" class="btn theme-btn w-100 mt-1">Cancel Transport</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- reasons offcanvas end -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cancel Transport</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="theme-form mt-0" action="{{url('driver/cancel-ride')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" class="offer_id">
                    <input type="hidden" name="is_user_cancelled" value="false">
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label class="form-label mb-2" for="InputComments">Reasons</label>
                            <textarea class="form-control white-background" required id="InputComments" name="reason"
                                      placeholder="Enter Reason" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Cancel Offer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
    <script>

        let driverLat = null;
        let driverLng = null;

        // Keep geolocation watcher running
        if ("geolocation" in navigator) {
            navigator.geolocation.watchPosition(
                (position) => {
                    driverLat = position.coords.latitude;
                    driverLng = position.coords.longitude;

                    console.log(`Location updated: ${driverLat}, ${driverLng}`);
                },
                (error) => {
                    console.error("Geolocation error:", error.message);
                },
                {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 5000,
                }
            );
        }

        setInterval(() => {
            console.log("Timeout triggered");  // Debug
            getUserRideRequest();
        }, 2000);

        function formatDate(dateStr) {
            if (!dateStr) return '';
            let d = new Date(dateStr);
            if (isNaN(d)) return dateStr; // fallback if invalid
            return d.toLocaleDateString('en-US', {
                month: 'short',
                day: '2-digit',
                year: 'numeric'
            });
        }

        function getUserRideRequest() {
            $.ajax({
                url: `/user/get-personal-ride-request`,
                method: 'GET',
                success: function (response) {
                    if (response && response.length) {

                        @if(isset($driver_request))
                        let driver_request = {!! json_encode($driver_request) !!} || {};
                        @else
                        let driver_request = {};
                        @endif

                        let html = '';
                        response.forEach(ride => {

                            // Parse destination_location
                            let destinations = [];
                            try {
                                destinations = JSON.parse(ride.destination_location);
                            } catch (e) {
                                destinations = [ride.destination_location];
                            }
                            let destinationHtml = destinations.map(dest => `
                <li class="border-0 shadow-none box-background">
                    <div class="location-box bg-transparent">
                        <img class="icon" src="/assets/images/svg/gps.svg" alt="gps">
                        <h5 class="fw-light title-color border-0">${dest}</h5>
                    </div>
                </li>`).join('');

                            // Profile Image
                            let profileImg = ride.user.profile
                                ? `/storage/${ride.user.profile}`
                                : '/assets/images/profile/p5.png';

                            // Determine button text
                            let text = 'Send a transport request';
                            if (driver_request && driver_request.status === 'waiting'
                                && driver_request.userriderequest_id === ride.id) {
                                text = 'Transport Request Sent';
                            }

                            let transportIcon = '🚚';

                            html += `
                <div class="custom-card">
                    <!-- Header: User + Fare -->
                    <div class="custom-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <a href="/driver/accept-ride/${ride.id}" class="my-ride-img">
                                <img class="img-fluid profile-img" style="border-radius:50%; width:40px; height:40px; object-fit:cover;"
                                     src="${profileImg}" alt="profile">
                            </a>
                            <span>👤 ${ride.user.name}</span>
                        </div>
                        <span>${ride.fare_currency} ${ride.fare}</span>
                    </div>

                    <!-- Posted On -->
                    <div>
                        <span class="custom-label">📅 Posted on:</span> ${formatDate(ride.created_at)}
                    </div>

                    <!-- Status -->
                    <div class="custom-section text-center">
                        <span class="badge badge-info">${ride.status}</span>
                    </div>

                    <!-- Ride Details -->
                    <div class="custom-section">
                        <div>🔹 <span class="custom-label">Distance:</span> ${ride.distance || 'N/A'} km</div>
                        <div>${transportIcon} <span class="custom-label">Transport:</span> ${ride.transport_title || ride.title}</div>
                        ${ride.expiry ? `<div>📅 <span class="custom-label">Expiry:</span> ${ride.expiry}</div>` : ''}
                    </div>

                    <!-- Route -->
                    <div class="custom-section text-center">
                        ${transportIcon} ${ride.pickup_location || 'Unknown'}
                        ${destinationHtml ? `⟶ ${destinations.join(', ')}` : ''}
                    </div>

                    <!-- Footer: Contact + Actions -->
                    <div class="custom-footer d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-2">
                            <a href="/driver/chatting" class="text-decoration-none">
                                <img class="img-fluid communication-icon" src="/assets/images/svg/messages-fill.svg" alt="messages">
                            </a>
                            <div class="dropdown">
                                <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="img-fluid communication-icon" src="/assets/images/svg/call-fill.svg" alt="contact">
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="tel:${ride.user.phone}">📞 Call Sender</a></li>
                                    <li><a class="dropdown-item" href="tel:${ride.receiver_phone}">📞 Call Receiver</a></li>
                                </ul>
                            </div>
                            <a href="/driver/accept-ride/${ride.id}">
                                <img src="/public/assets/images/view-detail-image.png" title="View details and negotiate" width="30px" alt="loading">
                            </a>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="text-center my-3">
                        <a href="/driver/accept-ride/${ride.id}" class="btn theme-btn w-100 mb-2">
                            View details and negotiate
                        </a>
                        <form method="post" action="/driver/request-fare">
                            <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                            <input type="hidden" name="driver_location_latitude">
                            <input type="hidden" name="driver_location_longitude">
                            <input type="hidden" name="userriderequest_id" value="${ride.id}">
                            <input type="hidden" name="requested_fare" value="${ride.fare}">
                            <button type="submit" class="btn theme-btn w-100 accept-fare-btn">${text}</button>
                        </form>
                    </div>
                </div>`;
                        });

                        $('#userRideList').html(html);
                    } else {
                        $('#userRideList').html('<p>No Personal Ride Offers Available.</p>');
                    }
                },

                error: function (xhr) {
                    console.error("Error fetching fare requests:", xhr.responseText);
                }
            });
        }

        $(document).on('click', '.accept-fare-btn', function (e) {
            e.preventDefault();

            let button = $(this);
            let form = button.closest("form");

            // Disable button while waiting
            button.prop("disabled", true).text("Getting current location...");

            if (!driverLat || !driverLng) {
                // Poll until location is ready
                let interval = setInterval(() => {
                    if (driverLat && driverLng) {
                        clearInterval(interval);
                        form.find('input[name="driver_location_latitude"]').val(driverLat);
                        form.find('input[name="driver_location_longitude"]').val(driverLng);

                        button.text("Submitting...");
                        form.submit();
                    }
                }, 1000);
            } else {
                // Already have location
                form.find('input[name="driver_location_latitude"]').val(driverLat);
                form.find('input[name="driver_location_longitude"]').val(driverLng);

                button.text("Submitting...");
                form.submit();
            }
        });


        $(document).ready(function () {

            $('.cancel_rideBtn').click(function () {
                $('.offer_id').val($(this).data('id'));
            })

            $('.cancel_offerBtn').click(function () {
                $('.offer_id').val($(this).data('id'));
            })

        });


    </script>
    <script>
        $(document).on('change', '.update-datetime', function () {
            let offerId = $(this).data('id');
            let field = $(this).data('field');
            let value = $(this).val();

            $.ajax({
                url: "{{ route('driver.offers.update-datetime') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: offerId,
                    field: field,
                    value: value
                },
                success: function (response) {
                    toastr.success(response.message, 'Updated');
                },
                error: function () {
                    toastr.error('Failed to update date/time', 'Error');
                }
            });
        });
    </script>


@endsection
