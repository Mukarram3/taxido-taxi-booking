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
            border: 3px dashed #2ecc71;
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

                    <ul class="my-ride-list driver-ride-list p-1" style="border: 2px solid orange; border-radius: 8px;">

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

                                <!-- Ride Type -->
                                <div class="custom-section">
                                    ✈️ {{ $active_ride->transport_title }}
                                </div>

                                <!-- Ride Status -->
                                <div class="custom-section">
                                    📦 {{ $badgeText }}
                                </div>

                                <!-- Ride Details -->
                                <div class="custom-section">
                                    @if(!empty($active_ride->departure_date))
                                        <div>📅 <span class="custom-label">Departure:</span> {{ $active_ride->departure_date }}</div>
                                    @endif

                                    @if(!empty($active_ride->arrival_date))
                                        <div>📅 <span class="custom-label">Arrival:</span> {{ $active_ride->arrival_date }}</div>
                                    @endif

                                    @if(!empty($active_ride->expiry))
                                        <div>📅 <span class="custom-label">Expiration:</span> {{ $active_ride->expiry }}</div>
                                    @endif
                                </div>

                                <!-- Route -->
                                <div class="custom-section text-center">
                                    ✈️ {{ $active_ride->pickup_location }} ⟶ {{ implode(', ', json_decode($active_ride->destination_location, true)) }}
                                </div>

                                <!-- Footer -->
                                <div class="custom-footer">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-decoration-none text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-telephone-fill text-success"></i> Contact
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="tel:{{ $active_ride->user->phone }}">📞 Contact Sender</a></li>
                                            <li><a class="dropdown-item" href="tel:{{ $active_ride->receiver_phone }}">📞 Contact Receiver</a></li>
                                        </ul>
                                    </div>

                                    <a href="{{ url('driver/chatting') }}" class="text-black text-decoration-none">
                                        <i class="bi bi-chat-dots-fill text-success"></i> Message
                                    </a>

                                    <a href="{{ url('user/ride-details?ride_id='.$active_ride->id) }}" class="text-decoration-none">📄 Details</a>
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
                                <div class="custom-section">
                                    ✈️ I Travel - I Offer My Kilos Of Luggage For Sale
                                </div>

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
                                    ✈️ {{ $ride->driverriderequest->pickup_location }} ⟶ {{ implode(', ', $ride->driverriderequest->destination_location) }}
                                </div>

                                <!-- Footer -->
                                <div class="custom-footer">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-decoration-none text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-telephone-fill text-success"></i> Contact
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="tel:{{ $ride->user->phone }}">📞 Contact Sender</a></li>
                                            <li><a class="dropdown-item" href="tel:{{ $ride->userfarerequest->receiver_phone }}">📞 Contact Receiver</a></li>
                                        </ul>
                                    </div>

                                    <a href="{{ url('driver/chatting') }}" class="text-black text-decoration-none">
                                        <i class="bi bi-chat-dots-fill text-success"></i> Message
                                    </a>

                                    <a href="{{ url('driver/reserved-kilo-ride-details?ride_id='.$ride->id) }}" class="text-decoration-none">📄 Details</a>
                                </div>

                                <div class="text-center my-3">
                                    <a class="btn btn-warning w-100 mt-3" href="{{ url('driver/reserved-kilo-ride-details?ride_id='.$ride->id) }}">View Details and negotiate</a>
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
                                            {{--                                                <a href="{{url('driver/start-parcel-return/'.$active_reserved_kilo_ride->id)}}"--}}
                                            {{--                                                   class="btn btn-warning w-100 mt-3">Start Parcel Return</a>--}}
                                        @elseif($ride->message == "Package return in progress")
                                            {{--                                                <a href="{{ url('driver/track-ride/'. $active_ride->id) }}"--}}
                                            {{--                                                   class="btn btn-yellow w-100 auth-btn mt-3">GPS navigation for Parcel--}}
                                            {{--                                                    Return</a>--}}
                                            {{--                                                <a href="{{url('driver/package-returned-request/'.$active_reserved_kilo_ride->id)}}"--}}
                                            {{--                                                   class="btn btn-warning w-100 mt-3">Parcel Returned</a>--}}
                                        @elseif($ride->message == 'Parcel returned')
                                        @elseif(trim($ride->message) !== 'transport completed awaiting validation')
                                            <a href="#reasons" data-bs-toggle="offcanvas"
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
                    <ul class="my-ride-list driver-ride-list" style="border: 1px solid black; border-radius: 8px;">
                        @foreach($pending_rides as $pending_ride)
                            <li class="white-background">
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="#" class="my-ride-img">
                                            <img class="img-fluid profile-img"
                                                 src="{{ $pending_ride->user->profile ? asset('storage/'.$pending_ride->user->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="#">
                                                    <h6 class="title-color fw-medium">{{ $pending_ride->user->name }}</h6>
                                                </a>
                                                <span
                                                    class="badge badge-success text-white">{{ $pending_ride->created_at }}</span>
                                                <h5 class="fw-mediun success-color">{{ $pending_ride->fare_currency}} {{ $pending_ride->fare }}</h5>
                                            </div>
                                            <div class="flex-align-center gap-3">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div>
                                                <h6 class="fw-normal title-color">{{ $pending_ride->date_and_time_of_followup }}</h6>
                                                <h6 class="fw-normal title-color">{{ $pending_ride->distance }} km</h6>
                                            </div>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}"
                                                         alt="messages">
                                                </a>
                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button"
                                                       data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon"
                                                             src="{{asset('assets/images/svg/call-fill.svg')}}"
                                                             alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $pending_ride->user->phone }}">📞 Call
                                                                Sender</a></li>
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $pending_ride->receiver_phone }}">📞 Call
                                                                Receiver</a></li>
                                                    </ul>
                                                </div>
                                                <a href="{{url('user/ride-details?ride_id='.$pending_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                         title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>
                                        @php
                                            $means = json_decode($pending_ride->means_of_transport, true);
                                            $destination_location = json_decode($pending_ride->destination_location, true);
                                                        $meanNames = is_array($means)
                                                            ? \App\Models\Mean_of_transport::whereIn('id', $means)->pluck('name')->toArray()
                                                            : [];
                                        @endphp
                                        <div class="d-flex flex-column">
                                            <p class="fw-bold">{{ $pending_ride->transport_title }}</p>
                                            {{--                                            <p>Mean of Transport :- {{ is_array($meanNames) ? implode(', ', $meanNames) : '' }}</p>--}}
                                            {{--                                            <p>Departure Date :- {{ $pending_ride->departure_date }}</p>--}}
                                            {{--                                            <p>Expiry Date :- {{ $pending_ride->expiry }}</p>--}}
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon"
                                                         src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $pending_ride->pickup_location }}</h5>
                                                </div>
                                            </li>
                                            @php
                                                $locations = json_decode($pending_ride->destination_location, true); // returns array
                                            @endphp
                                            @foreach($locations as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent"
                                                             src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <a href="{{url('driver/start-ride/'.$pending_ride->id)}}"
                                       class="btn theme-btn w-100 mt-3">Start the Collection of the Package</a>
                                    <a href="#reasons" data-bs-toggle="offcanvas" data-id="{{ $pending_ride->id }}"
                                       class="btn btn-danger w-100 mt-3 cancel_rideBtn">Cancel the Transport</a>
                                </div>
                            </li>
                        @endforeach
                        @foreach($pending_reserved_kilo_rides as $pending_reserved_kilo_ride)
                            @php
                                $badgeClass = 'badge badge-info'; // base class
                                $badgeText = 'Package Awaiting Collection';
                            @endphp
                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head d-flex align-items-center w-100" style="min-width: 0;">
                                        <!-- Profile Image -->
                                        <a href="#" class="my-ride-img flex-shrink-0">
                                            <img class="img-fluid profile-img"
                                                 style="border-radius: 100%; width:40px; height:40px; object-fit:cover;"
                                                 src="{{ $pending_reserved_kilo_ride->driver->profile ? asset('storage/'.$pending_reserved_kilo_ride->driver->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <!-- Ride Content -->
                                        <div class="d-flex align-items-center flex-grow-1 ms-2" style="min-width: 0;">
                                            <!-- Driver Name -->
                                            <h6 class="title-color fw-medium mb-0 me-2 flex-shrink-0">
                                                {{ $pending_reserved_kilo_ride->driver->name }}
                                            </h6>

                                            <!-- Badge (can grow in height if text is long) -->
                                            <span class="badge badge-success text-white me-2 flex-grow-1 text-center"
                                                  style="white-space: normal;">
                                                I Travel - I Offer My Kilos Of Luggage For Sale
                                            </span>

                                            <!-- Price (sticks to the right, vertically centered) -->
                                            <h5 class="fw-medium success-color mb-0 flex-shrink-0 ms-2">
                                                {{ $pending_reserved_kilo_ride->driverriderequest->price_currency }}{{ $pending_reserved_kilo_ride->price_per_kilo }}
                                                /Kilo
                                            </h5>
                                        </div>
                                    </div>

                                    <span class="{{ $badgeClass }} mt-2">{{ $pending_reserved_kilo_ride->message }}</span>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div>
                                                <h6 class="fw-normal title-color">{{ \Carbon\Carbon::parse($pending_reserved_kilo_ride->date_and_time_of_followup)->format('Y d M H:i:s') }}</h6>
                                                <h6 class="fw-normal title-color">{{ $pending_reserved_kilo_ride->driverriderequest->distance }} km</h6>
                                            </div>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}"
                                                         alt="messages">
                                                </a>
                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button"
                                                       data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon"
                                                             src="{{asset('assets/images/svg/call-fill.svg')}}"
                                                             alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $pending_reserved_kilo_ride->user->phone }}">📞 Call
                                                                Sender</a></li>
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $pending_reserved_kilo_ride->userfarerequest->receiver_phone }}">📞 Call
                                                                Receiver</a></li>
                                                    </ul>
                                                </div>
                                                <a href="{{url('driver/reserved-kilo-ride-details?ride_id='.$pending_reserved_kilo_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                         title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            @if($pending_reserved_kilo_ride->driverriderequest->airline)
                                                <p><span class="fw-bold">Travel Company</span>
                                                    :- {{ $pending_reserved_kilo_ride->driverriderequest->airline }}</p>
                                            @endif
                                            @if($pending_reserved_kilo_ride->driverriderequest->maritimes)
                                                <p><span class="fw-bold">Travel Company</span>
                                                    :- {{ $pending_reserved_kilo_ride->driverriderequest->maritimes }}</p>
                                            @endif
                                            <p><span class="fw-bold">Available Transport Capacity</span>
                                                :- {{  $pending_reserved_kilo_ride->driverriderequest->available_transport_capacity }}</p>
                                            <p><span class="fw-bold">Number of Kilos Reserved</span>
                                                :- {{ $pending_reserved_kilo_ride->driverriderequest->total_transport_capacity - $pending_reserved_kilo_ride->driverriderequest->available_transport_capacity }}</p>
                                            <p><span class="fw-bold">Departure Date</span>
                                                :- {{ $pending_reserved_kilo_ride->driverriderequest->departure_datetime->format('Y d M H:i:s') }}</p>
                                            <p><span class="fw-bold">Arrival Date</span>
                                                :- {{ $pending_reserved_kilo_ride->driverriderequest->arrival_datetime?->format('Y d M H:i:s') }}</p>
                                            <p><span class="fw-bold">Expiry Date</span>
                                                :- {{ $pending_reserved_kilo_ride->driverriderequest->end_reservation_date?->format('Y d M H:i:s') }}</p>
                                            <p><span class="fw-bold">method of reception</span>
                                                :- {{ $pending_reserved_kilo_ride->driverriderequest->package_receiving_method }}</p>
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon"
                                                         src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $pending_reserved_kilo_ride->driverriderequest->pickup_location }}</h5>
                                                </div>
                                            </li>
                                            @foreach($pending_reserved_kilo_ride->driverriderequest->destination_location as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent"
                                                             src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @if($pending_reserved_kilo_ride->message == 'Package Collected Requested')
                                        <a href="{{ url('driver/confirm-package-collected/'. $pending_reserved_kilo_ride->id) }}" class="btn btn-warning w-100 auth-btn mt-3">Confirm Package Collected</a>
                                    @endif
                                    @if($pending_reserved_kilo_ride->message == 'Package Collected')
                                        <a href="{{url('driver/start-reserved-kilo-ride/'.$pending_reserved_kilo_ride->id)}}"
                                           class="btn theme-btn w-100 mt-3">Start the Delivery of the Package</a>
                                    @endif
                                    <a href="#offers" data-bs-toggle="offcanvas" data-id="{{ $pending_reserved_kilo_ride->id }}"
                                       class="btn btn-danger w-100 mt-3 cancel_offerBtn">Cancel the Transport</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="pending_offers-tab">
                    <ul class="my-ride-list driver-ride-list">
                        @forelse($pending_offers as $pending_offer)
                            @php
                                $badgeClass = 'badge badge-info'; // base class
                                $badgeText = 'Package Awaiting Collection';
                            @endphp
                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head d-flex align-items-center w-100" style="min-width: 0;">
                                        <!-- Profile Image -->
                                        <a href="#" class="my-ride-img flex-shrink-0">
                                            <img class="img-fluid profile-img"
                                                 style="border-radius: 100%; width:40px; height:40px; object-fit:cover;"
                                                 src="{{ $pending_offer->driver->profile ? asset('storage/'.$pending_offer->driver->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <!-- Ride Content -->
                                        <div class="d-flex align-items-center flex-grow-1 ms-2" style="min-width: 0;">
                                            <!-- Driver Name -->
                                            <h6 class="title-color fw-medium mb-0 me-2 flex-shrink-0">
                                                {{ $pending_offer->driver->name }}
                                            </h6>

                                            <!-- Badge (can grow in height if text is long) -->
                                            <span class="badge badge-success text-white me-2 flex-grow-1 text-center"
                                                  style="white-space: normal;">
                                                I Travel - I Offer My Kilos Of Luggage For Sale
                                            </span>

                                            <!-- Price (sticks to the right, vertically centered) -->
                                            <h5 class="fw-medium success-color mb-0 flex-shrink-0 ms-2">
                                                {{ $pending_offer->price_currency }}{{ $pending_offer->price_per_kilo }}
                                                /Kilo
                                            </h5>
                                        </div>
                                    </div>


                                    <span class="{{ $badgeClass }} mt-2">{{ $badgeText }}</span>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div>
                                                <h6 class="fw-normal title-color">{{ $pending_offer->created_at->format('Y d M H:i:s') }}</h6>
                                                <h6 class="fw-normal title-color">{{ $pending_offer->distance }} km</h6>
                                            </div>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/reserved-kilo-offer-details?ride_id='.$pending_offer->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                         title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            @if($pending_offer->airline)
                                                <p><span class="fw-bold">Travel Company</span>
                                                    :- {{ $pending_offer->airline }}</p>
                                            @endif
                                            @if($pending_offer->maritimes)
                                                <p><span class="fw-bold">Travel Company</span>
                                                    :- {{ $pending_offer->maritimes }}</p>
                                            @endif
                                            <p><span class="fw-bold">Available Transport Capacity</span>
                                                :- {{  $pending_offer->available_transport_capacity }}</p>
                                            <p><span class="fw-bold">Number of Kilos Reserved</span>
                                                :- {{ $pending_offer->total_transport_capacity - $pending_offer->available_transport_capacity }}</p>
                                            <p><span class="fw-bold">Departure Date</span>
                                                :- {{ $pending_offer->departure_datetime->format('Y d M H:i:s') }}</p>
                                            <p><span class="fw-bold">Arrival Date</span>
                                                :- {{ $pending_offer->arrival_datetime?->format('Y d M H:i:s') }}</p>
                                            <p><span class="fw-bold">Expiry Date</span>
                                                :- {{ $pending_offer->end_reservation_date?->format('Y d M H:i:s') }}</p>
                                            <p><span class="fw-bold">method of reception</span>
                                                :- {{ $pending_offer->package_receiving_method }}</p>
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon"
                                                         src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $pending_offer->pickup_location }}</h5>
                                                </div>
                                            </li>
                                            @foreach($pending_offer->destination_location as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent"
                                                             src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <a href="{{url('driver/user-fare-requests?id='.$pending_offer->id)}}" class="btn btn-warning w-100 mt-3">View User Requests</a>
                                    <a href="#offers" data-bs-toggle="offcanvas" data-id="{{ $pending_offer->id }}"
                                       class="btn btn-danger w-100 mt-3 cancel_offerBtn">Cancel the Transport</a>
                                </div>
                            </li>
                        @empty
                            <p>No Personal Ride Offers Available.</p>
                        @endforelse
                    </ul>
                </div>

                <div class="tab-pane fade" id="personal_offers-tab">
                    <ul class="my-ride-list driver-ride-list" id="userRideList">
                        @forelse($personal_offers as $personal_offer)
                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="#" class="my-ride-img">
                                            <img class="img-fluid profile-img"
                                                 src="{{ $personal_offer->user->profile ? asset('storage/'.$personal_offer->user->profile) : asset('assets/images/profile/p5.png') }}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="{{url('user/ride-details?ride_id='.$personal_offer->id)}}">
                                                    <h5 class="title-color fw-medium">{{ $personal_offer->user->name }}</h5>
                                                </a>
                                                <span
                                                    class="badge badge-success text-white">{{ $personal_offer->created_at }}</span>
                                                <div class="flex-align-center">
                                                    <h5 class="fw-mediun theme-color price ps-2 pe-0">{{ $personal_offer->fare_currency }} {{ $personal_offer->fare }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div class="flex-align-center gap-1">
                                                <img class="icon img-fluid"
                                                     src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                     alt="location">
                                                <h6 class="fw-normal title-color">{{ $personal_offer->distance }}
                                                    km</h6>
                                            </div>
                                            <div>
                                                <span class="fw-bold">{{ $personal_offer->transport_title }}</span>
                                            </div>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}"
                                                         alt="messages">
                                                </a>
                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button"
                                                       data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon"
                                                             src="{{asset('assets/images/svg/call-fill.svg')}}"
                                                             alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $personal_offer->user->phone }}">📞 Call
                                                                Sender</a></li>
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $personal_offer->receiver_phone }}">📞 Call
                                                                Receiver</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $means = json_decode($personal_offer->means_of_transport, true);
                                            $destination_location = json_decode($personal_offer->destination_location, true);
                                                        $meanNames = is_array($means)
                                                            ? \App\Models\Mean_of_transport::whereIn('id', $means)->pluck('name')->toArray()
                                                            : [];
                                        @endphp
                                        <div class="d-flex flex-column">
                                            <p>{{ $personal_offer->title }}</p>
                                            {{--                                            <p>Mean of Transports :- {{ is_array($meanNames) ? implode(', ', $meanNames) : '' }}</p>--}}
                                            {{--                                            <p>Departure Date :- {{ $personal_offer->departure_date }}</p>--}}
                                            <p>Expiry Date :- {{ $personal_offer->expiry }}</p>
                                        </div>
                                        {{--                                        <div class="d-flex flex-row">--}}
                                        {{--                                            @php--}}
                                        {{--                                                $parcel_pictures = $personal_offer->parcel_pictures ? json_decode($personal_offer->parcel_pictures) : '';--}}
                                        {{--                                            @endphp--}}
                                        {{--                                            @if($parcel_pictures)--}}
                                        {{--                                                @foreach($parcel_pictures as $parcel_picture)--}}
                                        {{--                                                    <img src="{{ asset('storage/'. $parcel_picture) }}" class="me-1" width="50" height="50" alt="loading">--}}
                                        {{--                                                @endforeach--}}
                                        {{--                                            @endif--}}
                                        {{--                                        </div>--}}
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none box-background">
                                                <div class="location-box bg-transparent">
                                                    <img class="icon"
                                                         src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $personal_offer->pickup_location }}</h5>
                                                </div>
                                            </li>

                                            @php
                                                $locations = json_decode($personal_offer->destination_location, true); // returns array
                                            @endphp

                                            @foreach($locations as $location)
                                                <li class="border-0 shadow-none box-background">
                                                    <div class="location-box bg-transparent">
                                                        <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}"
                                                             alt="gps">
                                                        <h5 class="fw-light title-color border-0">{{ $location }}</h5>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <a href="{{route('driver.accept_ride',['id'=>$personal_offer->id])}}"
                                       class="btn theme-btn w-100 auth-btn mt-3">View details and negotiate</a>
                                    @php
                                        if (\Illuminate\Support\Facades\Auth::guard('driver')->check()){
                                            $driver_request = \App\Models\Driverfarerequest::where('driver_id',\Illuminate\Support\Facades\Auth::guard('driver')->user()->id)->where('userriderequest_id', $personal_offer->id)->orderby('id','desc')->first();
                                            if ($driver_request && $driver_request->status == 'waiting' && $personal_offer->id == $driver_request->userriderequest_id){
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
                                    <form method="post" action="{{ url('driver/request-fare') }}">
                                        @csrf
                                        <input type="hidden" name="driver_location_latitude"
                                               id="driver_location_latitude">
                                        <input type="hidden" name="driver_location_longitude"
                                               id="driver_location_longitude">
                                        <button type="submit" class="btn theme-btn w-100 auth-btn mt-3 accept-fare-btn"
                                                data-userriderequest_id="{{ $personal_offer->id }}"
                                                data-requested_fare="{{ $personal_offer->fare }}">
                                            {{ $text }}
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @empty
                            <p>No Personal Ride Offers Available.</p>
                        @endforelse
                    </ul>
                </div>

                <div class="tab-pane fade" id="complete-tab">
                    <ul class="my-ride-list driver-ride-list" style="border: 1px solid blue; border-radius: 8px;">
                        @foreach($completed_rides as $completed_ride)
                            <li class="white-background">
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="#" class="my-ride-img">
                                            <img class="img-fluid profile-img"
                                                 src="{{ $completed_ride->user->profile ? asset('storage/'.$completed_ride->user->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="#">
                                                    <h6 class="title-color fw-medium">{{ $completed_ride->user->name }}</h6>
                                                </a>
                                                <span
                                                    class="badge badge-success text-white">{{ $completed_ride->created_at }}</span>
                                                <h5 class="fw-mediun success-color">{{ $completed_ride->fare_currency}} {{ $completed_ride->fare }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div>
                                                <h6 class="fw-normal title-color">{{ $completed_ride->date_and_time_of_followup }}</h6>
                                                <h6 class="fw-normal title-color">{{ $completed_ride->distance }}
                                                    km</h6>
                                            </div>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}"
                                                         alt="messages">
                                                </a>
                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button"
                                                       data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon"
                                                             src="{{asset('assets/images/svg/call-fill.svg')}}"
                                                             alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $completed_ride->user->phone }}">📞 Call
                                                                Sender</a></li>
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $completed_ride->receiver_phone }}">📞 Call
                                                                Receiver</a></li>
                                                    </ul>
                                                </div>
                                                <a href="{{url('user/ride-details?ride_id='.$completed_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                         title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>
                                        @php
                                            $means = json_decode($completed_ride->means_of_transport, true);
                                            $destination_location = json_decode($completed_ride->destination_location, true);
                                                        $meanNames = is_array($means)
                                                            ? \App\Models\Mean_of_transport::whereIn('id', $means)->pluck('name')->toArray()
                                                            : [];
                                        @endphp
                                        <div class="d-flex flex-column">
                                            <p class="fw-bold">{{ $completed_ride->transport_title }}</p>
                                            {{--                                            <p>Mean of Transport :- {{ is_array($meanNames) ? implode(', ', $meanNames) : '' }}</p>--}}
                                            {{--                                            <p>Departure Date :- {{ $completed_ride->departure_date }}</p>--}}
                                            {{--                                            <p>Expiry Date :- {{ $completed_ride->expiry }}</p>--}}
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon"
                                                         src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $completed_ride->pickup_location }}</h5>
                                                </div>
                                            </li>

                                            @php
                                                $locations = json_decode($completed_ride->destination_location, true); // returns array
                                            @endphp
                                            @foreach($locations as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent"
                                                             src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        @foreach($completed_reserved_kilo_rides as $completed_reserved_kilo_ride)
                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head d-flex align-items-center w-100" style="min-width: 0;">
                                        <!-- Profile Image -->
                                        <a href="#" class="my-ride-img flex-shrink-0">
                                            <img class="img-fluid profile-img"
                                                 style="border-radius: 100%; width:40px; height:40px; object-fit:cover;"
                                                 src="{{ $completed_reserved_kilo_ride->user->profile ? asset('storage/'.$completed_reserved_kilo_ride->user->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <!-- Ride Content -->
                                        <div class="d-flex align-items-center flex-grow-1 ms-2" style="min-width: 0;">
                                            <!-- Driver Name -->
                                            <h6 class="title-color fw-medium mb-0 me-2 flex-shrink-0">
                                                {{ $completed_reserved_kilo_ride->user->name }}
                                            </h6>

                                            <!-- Badge (can grow in height if text is long) -->
                                            <span class="badge badge-success text-white me-2 flex-grow-1 text-center"
                                                  style="white-space: normal;">
                                                I Travel - I Offer My Kilos Of Luggage For Sale
                                            </span>

                                            <!-- Price (sticks to the right, vertically centered) -->
                                            <h5 class="fw-medium success-color mb-0 flex-shrink-0 ms-2">
                                                {{ $completed_reserved_kilo_ride->driverriderequest->price_currency }}{{ $completed_reserved_kilo_ride->price_per_kilo }}
                                                /Kilo
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div>
                                                <h6 class="fw-normal title-color">{{ \Carbon\Carbon::parse($completed_reserved_kilo_ride->date_and_time_of_followup)->format('Y d M H:i:s') }}</h6>
                                                <h6 class="fw-normal title-color">{{ $completed_reserved_kilo_ride->driverriderequest->distance }} km</h6>
                                            </div>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}"
                                                         alt="messages">
                                                </a>
                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button"
                                                       data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon"
                                                             src="{{asset('assets/images/svg/call-fill.svg')}}"
                                                             alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $completed_reserved_kilo_ride->user->phone }}">📞 Call
                                                                Sender</a></li>
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $completed_reserved_kilo_ride->userfarerequest->receiver_phone }}">📞 Call
                                                                Receiver</a></li>
                                                    </ul>
                                                </div>
                                                <a href="{{url('driver/reserved-kilo-ride-details?ride_id='.$completed_reserved_kilo_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                         title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            @if($completed_reserved_kilo_ride->driverriderequest->airline)
                                                <p><span class="fw-bold">Travel Company</span>
                                                    :- {{ $completed_reserved_kilo_ride->driverriderequest->airline }}</p>
                                            @endif
                                            @if($completed_reserved_kilo_ride->driverriderequest->maritimes)
                                                <p><span class="fw-bold">Travel Company</span>
                                                    :- {{ $completed_reserved_kilo_ride->driverriderequest->maritimes }}</p>
                                            @endif
                                            <p><span class="fw-bold">Number of Kilos Reserved</span>
                                                :- {{ $completed_reserved_kilo_ride->driverriderequest->total_transport_capacity - $completed_reserved_kilo_ride->driverriderequest->available_transport_capacity }}</p>
                                            <p><span class="fw-bold">Departure Date</span>
                                                :- {{ $completed_reserved_kilo_ride->driverriderequest->departure_datetime->format('Y d M H:i:s') }}</p>
                                            <p><span class="fw-bold">Arrival Date</span>
                                                :- {{ $completed_reserved_kilo_ride->driverriderequest->arrival_datetime?->format('Y d M H:i:s') }}</p>
                                            <p><span class="fw-bold">Expiry Date</span>
                                                :- {{ $completed_reserved_kilo_ride->driverriderequest->end_reservation_date?->format('Y d M H:i:s') }}</p>
                                            <p><span class="fw-bold">method of reception</span>
                                                :- {{ $completed_reserved_kilo_ride->driverriderequest->package_receiving_method }}</p>
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon"
                                                         src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $completed_reserved_kilo_ride->driverriderequest->pickup_location }}</h5>
                                                </div>
                                            </li>
                                            @foreach($completed_reserved_kilo_ride->driverriderequest->destination_location as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent"
                                                             src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="cancel-tab">
                    <ul class="my-ride-list driver-ride-list" style="border: 1px solid red; border-radius: 8px;">
                        @foreach($cancelled_rides as $cancelled_ride)
                            <li class="white-background">
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="#" class="my-ride-img">
                                            <img class="img-fluid profile-img"
                                                 src="{{ $cancelled_ride->user->profile ? asset('storage/'.$cancelled_ride->user->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="#">
                                                    <h6 class="title-color fw-medium">{{ $cancelled_ride->user->name }}</h6>
                                                </a>
                                                <span
                                                    class="badge badge-success text-white">{{ $cancelled_ride->created_at }}</span>
                                                <h5 class="fw-mediun success-color">{{ $cancelled_ride->fare_currency}} {{ $cancelled_ride->fare }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div>
                                                <h6 class="fw-normal title-color">{{ $cancelled_ride->date_and_time_of_followup }}</h6>
                                                <h6 class="fw-normal title-color">{{ $cancelled_ride->distance }}
                                                    km</h6>
                                            </div>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}"
                                                         alt="messages">
                                                </a>
                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button"
                                                       data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon"
                                                             src="{{asset('assets/images/svg/call-fill.svg')}}"
                                                             alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $cancelled_ride->user->phone }}">📞 Call
                                                                Sender</a></li>
                                                        <li><a class="dropdown-item"
                                                               href="tel:{{ $cancelled_ride->receiver_phone }}">📞 Call
                                                                Receiver</a></li>
                                                    </ul>
                                                </div>
                                                <a href="{{url('user/ride-details?ride_id='.$cancelled_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                         title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>
                                        @php
                                            $means = json_decode($cancelled_ride->means_of_transport, true);
                                            $destination_location = json_decode($cancelled_ride->destination_location, true);
                                                        $meanNames = is_array($means)
                                                            ? \App\Models\Mean_of_transport::whereIn('id', $means)->pluck('name')->toArray()
                                                            : [];
                                        @endphp
                                        <div class="d-flex flex-column">
                                            <p class="fw-bold">{{ $cancelled_ride->transport_title }}</p>
                                            {{--                                            <p>Mean of Transport :- {{ is_array($meanNames) ? implode(', ', $meanNames) : '' }}</p>--}}
                                            {{--                                            <p>Departure Date :- {{ $cancelled_ride->departure_date }}</p>--}}
                                            {{--                                            <p>Expiry Date :- {{ $cancelled_ride->expiry }}</p>--}}
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon"
                                                         src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $cancelled_ride->pickup_location }}</h5>
                                                </div>
                                            </li>

                                            @php
                                                $locations = json_decode($cancelled_ride->destination_location, true); // returns array
                                            @endphp
                                            @foreach($locations as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent"
                                                             src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @if($cancelled_ride->is_return == true && $cancelled_ride->message != 'Package Returned')
                                        <a href="{{ url('driver/package-returned/'. $cancelled_ride->id) }}"
                                           class="btn btn-warning w-100 auth-btn mt-3">Package Returned</a>
                                        <a href="{{ url('driver/track-ride/'. $cancelled_ride->id) }}"
                                           class="btn btn-yellow w-100 auth-btn mt-3">GPS navigation for Parcel
                                            Return</a>
                                    @endif
                                </div>
                            </li>
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

        function getUserRideRequest() {
            $.ajax({
                url: `/user/get-personal-ride-request`,
                method: 'GET',
                success: function (response) {
                    if (response && response.length) {

                        @if(isset($driver_request))
                        let driver_request = {!! json_encode($driver_request) !!}; // e.g. { "1": "Car", "7": "Bike" }
                        @else
                        let driver_request = {}; // fallback empty object
                        @endif

                        let html = '';
                        let transportMap = {!! json_encode($allMeans) !!}; // e.g. { "1": "Car", "7": "Bike" }
                        response.forEach(ride => {

                            // Parse destination_location
                            let destinations = [];
                            try {
                                destinations = JSON.parse(ride.destination_location);
                            } catch (e) {
                                destinations = [ride.destination_location];
                            }
                            // try {
                            //     transportArray = JSON.parse(transportData);
                            // } catch (e) {
                            //     console.error("Invalid JSON:", transportData);
                            // }
                            // let transportNames = Array.isArray(transportArray)
                            //     ? transportArray.map(id => transportMap[id] ?? `Unknown (${id})`)
                            //     : [];
                            // let displayText = transportNames.join(', ');

                            let destinationHtml = destinations.map(dest => `
                        <li class="border-0 shadow-none box-background">
                            <div class="location-box bg-transparent">
                                <img class="icon" src="/assets/images/svg/gps.svg" alt="gps">
                                <h5 class="fw-light title-color border-0">${dest}</h5>
                            </div>
                        </li>`).join('');

                            // Parse parcel_pictures
                            let parcelPicturesHtml = '';
                            if (ride.parcel_pictures) {
                                try {
                                    const pictures = JSON.parse(ride.parcel_pictures);
                                    parcelPicturesHtml = pictures.map(pic => `
                                <img src="/storage/${pic}" class="me-1" width="50" height="50" alt="parcel">
                            `).join('');
                                } catch (e) {
                                    console.warn("Invalid parcel_pictures JSON:", e);
                                }
                            }

                            let profileImg = ride.user.profile
                                ? `/storage/${ride.user.profile}`
                                : '/assets/images/profile/p5.png';

                            let text = 'Send a transport request';

                            // Check if driver_request exists and is waiting
                            if (driver_request && driver_request.status === 'waiting'
                                && driver_request.userriderequest_id === ride.id) {
                                text = 'Transport Request Sent';
                            }

                            html += `
                    <li>
                        <div class="my-ride-box">
                            <div class="my-ride-head">
                                <a href="/driver/accept-ride/${ride.id}" class="my-ride-img">
                                    <img class="img-fluid profile-img" src="${profileImg}" alt="profile">
                                </a>
                                <div class="my-ride-content flex-column">
                                    <div class="flex-spacing">
                                        <a href="/driver/accept-ride/${ride.id}">
                                            <h5 class="title-color fw-medium">${ride.user.name}</h5>
                                        </a>
                                        <div class="flex-align-center">
<!--                                            <div class="flex-align-center gap-1 pe-2">-->
<!--                                                <img class="star" src="/assets/images/svg/star.svg" alt="star">-->
<!--                                                <h5 class="fw-normal title-color p-0">4.8</h5>-->
<!--                                            </div>-->
                                            <h5 class="fw-mediun theme-color price ps-2 pe-0">${ride.fare_currency} ${ride.fare}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="my-ride-details">
                                <div class="ride-info">
                                    <div class="flex-align-center gap-1">
                                        <img class="icon img-fluid" src="/assets/images/svg/location-fill.svg"
                                             alt="location">
                                        <h6 class="fw-normal title-color">${ride.distance} km</h6>
                                    </div>
                                    <div>
                                    <span class="fw-bold">${ride.transport_title}</span>
                                    </div>
                                    <div class="flex-align-center gap-2">
                                        <a href="{{url('driver/chatting')}}">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>
                                        <a href="tel: ${ride.user.phone}">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/call-fill.svg')}}" alt="call">
                                        </a>
                                    </div>
                                </div>

                                <div class="d-flex flex-column">
                                    <p>Expiry Date :- ${ride.expiry}</p>
                                </div>
                                <ul class="ride-location-listing">
                                    <li class="border-0 shadow-none box-background">
                                        <div class="location-box bg-transparent">
                                            <img class="icon" src="/assets/images/svg/location-fill.svg" alt="location">
                                            <h5 class="fw-light title-color">${ride.pickup_location}</h5>
                                        </div>
                                    </li>
                                    ${destinationHtml}
                                </ul>
                            </div>
                            <a href="/driver/accept-ride/${ride.id}" class="btn theme-btn w-100 auth-btn mt-3">View details and negotiate</a>
                             <form method="post" action="/driver/request-fare">
                             <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                                <input type="hidden" name="driver_location_latitude">
                                <input type="hidden" name="driver_location_longitude">
                                <input type="hidden" name="userriderequest_id" value="${ride.id}">
                                <input type="hidden" name="requested_fare" value="${ride.fare}">

                                <button type="submit" class="btn theme-btn w-100 auth-btn mt-3 accept-fare-btn">
                                    ${text}
                                </button>
                             </form>
                        </div>
                    </li>`;
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

@endsection
