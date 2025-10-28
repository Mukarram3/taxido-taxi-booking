@php use Illuminate\Support\Facades\URL; @endphp
@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

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

@endsection

@section('content')
    <!-- header starts -->
    @include('user-app.partials.header')
    <!-- header end -->

    @php
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
        <!-- my ride section starts -->
    <section class="section-b-space">

        <ul class="nav nav-pills my-ride-tab w-100 border-0 m-0" id="Tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="btn btn-warning my-ride-tab-btn active" id="pill-active-tab" data-bs-toggle="pill"
                        data-bs-target="#active-tab">In Progress
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-primary my-ride-tab-btn" id="pill-pending-tab" data-bs-toggle="pill"
                        data-bs-target="#pending-tab">Accepted
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link " id="pill-pending-offer-tab" data-bs-toggle="pill"
                        data-bs-target="#pending-offers-tab">On Hold
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="btn btn-secondary my-ride-tab-btn" id="pill-expired-offers-tab" data-bs-toggle="pill"
                        data-bs-target="#expired-offers-tab">Expired
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="btn btn-success my-ride-tab-btn" id="pill-complete-tab" data-bs-toggle="pill"
                        data-bs-target="#complete-tab">
                    Finished
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

                    <ul class="my-ride-list">
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
                                <div class="custom-header d-flex justify-content-between align-items-center">
                                    <span>👤 {{ $active_ride->driver->name }}</span>
                                    <span>{{ $active_ride->fare_currency }} {{ $active_ride->fare }}</span>
                                </div>

                                <!-- Badge -->
                                <div class="custom-section text-center">
                                    <span class="{{ $badgeClass }}">{{ $badgeText }}</span>
                                </div>

                                <!-- Transport Title -->
                                <div class="custom-section">
                                    <div>
                                        @php
                                            $transportName = $active_ride->mean_of_transport->name ?? '';
                                            $icon = $icons[$transportName] ?? '❓'; // default fallback
                                        @endphp
                                        {{ $icon }} <span class="custom-label">Transport:</span> {{ $active_ride->transport_title }}
                                    </div>
                                    <div>🔹 <span class="custom-label">Reference Number:</span> {{ $active_ride->reference_id }}</div>
                                    <div>🔹 <span class="custom-label">Distance:</span> {{ $active_ride->distance }} km</div>
                                    <div>⏰ <span
                                            class="custom-label">Follow-up:</span> {{ $active_ride->date_and_time_of_followup }}
                                    </div>
                                </div>

                                <!-- Route -->
                                <div class="custom-section text-center">
                                    {{ $icon }} {{ $active_ride->pickup_location }} ⟶
                                    {{ implode(' ⟶ ', json_decode($active_ride->destination_location, true)) }}
                                </div>

                                <!-- Contact & Details -->
                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('driver/chatting') }}" class="text-decoration-none">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon"
                                                     src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                       href="tel:{{ $active_ride->driver->phone }}">📞 Call Carrier</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                       href="tel:{{ $active_ride->receiver_phone }}">📞 Call Receiver</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <a href="{{ url('user/ride-details?ride_id='.$active_ride->id) }}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                 title="View package details" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="custom-section">
                                    <a href="{{ url('user/track-ride/'. $active_ride->id) }}"
                                       class="btn theme-btn w-100 mt-2">📍 Track Carrier</a>

                                    @if(($active_ride->status == 'active' || $active_ride->message == 'delivery in progress')
                                        && !in_array($active_ride->message, ['On the way to pickup','Parcel returned','Delivery in progress, parcel return requested','transport completed awaiting validation','Package return in progress']))
                                        <a href="{{ url('driver/return-parcel/'. $active_ride->id) }}"
                                           class="btn btn-warning w-100 mt-2">📦 Request Return Package</a>
                                    @elseif($active_ride->message == 'Parcel returned')
                                        @php
                                            $signedUrl = URL::temporarySignedRoute(
                                                'user.package.returned',
                                                now()->addMinutes(60),
                                                ['ride' => $active_ride->id, 'token' => sha1($active_ride->receiver_email)]
                                            );
                                        @endphp
                                        <a href="{{ $signedUrl }}" class="btn btn-warning w-100 mt-2">✅ Confirm Package
                                            Return</a>
                                    @elseif($active_ride->message === 'transport completed awaiting validation')
                                        @php
                                            $signedUrl = URL::temporarySignedRoute(
                                                'user.ride.complete',
                                                now()->addMinutes(60),
                                                ['ride' => $active_ride->id, 'token' => sha1($active_ride->receiver_email)]
                                            );
                                        @endphp
                                        <a href="{{ $signedUrl }}" class="btn btn-success w-100 mt-2">✅ Confirm Ride
                                            Completion</a>
                                    @else
                                        <a href="#reasons" data-bs-toggle="offcanvas" data-id="{{ $active_ride->id }}"
                                           class="btn btn-danger w-100 mt-2 cancel_rideBtn">❌ Cancel Transport</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        @foreach($active_reserved_kilo_rides as $active_reserverd_kilo_ride)
                            @php
                                $message = $active_reserverd_kilo_ride->message;
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
                                <div class="custom-header d-flex justify-content-between align-items-center">
                                    <span>👤 {{ $active_reserverd_kilo_ride->driver->name }}</span>
                                    <span>{{ $active_reserverd_kilo_ride->driverriderequest->price_currency }} {{ $active_reserverd_kilo_ride->totale_fare }}</span>
                                </div>

                                <!-- Badge -->
                                <div class="custom-section text-center">
                                    <span class="{{ $badgeClass }}">{{ $badgeText }}</span>
                                </div>

                                @if($active_reserverd_kilo_ride->driverriderequest->airline)
                                    <div>✈️ <span
                                            class="fw-bold">Travel Company:</span> {{ $active_reserverd_kilo_ride->driverriderequest->airline }}
                                    </div>
                                @endif
                                @if($active_reserverd_kilo_ride->driverriderequest->maritimes)
                                    <div>⛴️ <span
                                            class="fw-bold">Travel Company:</span> {{ $active_reserverd_kilo_ride->driverriderequest->maritimes }}
                                    </div>
                                @endif
                                <div> 🔹 <span
                                        class="fw-bold">Reference Number:</span> {{ $active_reserverd_kilo_ride->reference_id }}
                                </div>
                                <div>⏰ <span
                                        class="fw-bold">Follow-up:</span>{{ \Carbon\Carbon::parse($active_reserverd_kilo_ride->date_and_time_of_followup)->format('M d, Y') }}
                                </div>
                                <div> 🔹 <span
                                        class="fw-bold">Distance:</span> {{ $active_reserverd_kilo_ride->driverriderequest->distance }}
                                    km
                                </div>

                                <!-- Extra Info -->
                                <div>⚖️ <span
                                        class="fw-bold">Reserved Kilos:</span> {{ $active_reserverd_kilo_ride->reserved_kilo }}
                                </div>
                                <div>🛫 <span
                                        class="fw-bold">Departure:</span> {{ $active_reserverd_kilo_ride->driverriderequest->departure_datetime }}
                                </div>
                                <div>🛬 <span
                                        class="fw-bold">Arrival:</span> {{ $active_reserverd_kilo_ride->driverriderequest->arrival_datetime }}
                                </div>
                                <div>📅 <span
                                        class="fw-bold">Expiry:</span> {{ $active_reserverd_kilo_ride->driverriderequest->end_reservation_date }}
                                </div>
                                <div>📦 <span
                                        class="fw-bold">Reception Method:</span> {{ $active_reserverd_kilo_ride->driverriderequest->package_receiving_method }}
                                </div>

                                <!-- Route -->
                                <div class="custom-section text-center">
                                    @if(!empty($active_reserverd_kilo_ride->driverriderequest->airline))
                                        ✈️
                                    @endif

                                    @if(!empty($active_reserverd_kilo_ride->driverriderequest->maritimes))
                                        🚢
                                    @endif
                                    {{ $active_reserverd_kilo_ride->driverriderequest->pickup_location }}
                                    ⟶ {{ implode(' ⟶ ', $active_reserverd_kilo_ride->driverriderequest->destination_location) }}
                                </div>

                                <!-- Contact & Details -->
                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('driver/chatting') }}" class="text-decoration-none">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon"
                                                     src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                       href="tel:{{ $active_reserverd_kilo_ride->driver->phone }}">📞
                                                        Call Carrier</a></li>
                                                <li><a class="dropdown-item"
                                                       href="tel:{{ $active_reserverd_kilo_ride->receiver_phone }}">📞
                                                        Call Receiver</a></li>
                                            </ul>
                                        </div>

                                        <a href="{{ url('user/ride-details?ride_id='.$active_reserverd_kilo_ride->id) }}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                 title="View package details" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="custom-section">
                                    @if(trim($active_reserverd_kilo_ride->message) === 'transport completed awaiting validation')
                                        <a href="{{ route('user.reserved_kilo_ride.complete',['ride' => $active_reserverd_kilo_ride->id]) }}"
                                           class="btn btn-success w-100 mt-2">
                                            ✅ Confirm Ride Completion
                                        </a>
                                    @elseif($active_reserverd_kilo_ride->message == 'Parcel returned')
                                        <a href="{{ route('user.reserved_kilo.package.returned',['ride' => $active_reserverd_kilo_ride->id]) }}" class="btn btn-warning w-100 mt-2">✅ Confirm Package
                                            Return</a>
                                    @else
                                    @endif
                                        @if(in_array($active_reserverd_kilo_ride->message,['delivery in progress','Delivery in progress, parcel return requested','Package return in progress']))
                                            <a href="{{ url('user/track-reserved-kilo-ride/'. $active_reserverd_kilo_ride->id) }}"
                                               class="btn theme-btn w-100 mt-2">📍 Track Carrier</a>
                                            @if(!in_array($active_reserverd_kilo_ride->message,['Delivery in progress, parcel return requested','Package return in progress']))
                                                    <a href="#reserved_kilo_reasons_after_pickup" data-bs-toggle="offcanvas" data-id="{{ $active_reserverd_kilo_ride->id }}"
                                                       class="btn btn-warning w-100 mt-2 cancel_rideBtn">📦 Request Return Package</a>
                                            @endif
                                        @endif
                                </div>
                            </div>
                        @endforeach

                    </ul>
                </div>

                <div class="tab-pane fade" id="pending-tab">
                    <ul class="my-ride-list">
                        @php
                            $badgeClass = 'badge badge-info';
                            $badgeText = 'Package Awaiting Collection';
                        @endphp

                        {{-- 🚚 Pending Rides --}}
                        @foreach($pending_rides as $ride)
                            <div class="custom-card">
                                <!-- Header -->
                                <div class="custom-header d-flex justify-content-between align-items-center">
                                    <span>👤 {{ $ride->driver->name }}</span>
                                    <span>{{ $ride->fare_currency }} {{ $ride->fare }}</span>
                                </div>

                                <!-- Posted On -->
                                <div>
                                    <span
                                        class="custom-label">📅 Posted on:</span> {{ \Carbon\Carbon::parse($ride->created_at)->format('M d, Y') }}
                                </div>

                                <!-- Badge -->
                                <div class="custom-section text-center">
                                    <span class="{{ $badgeClass }}">{{ $badgeText }}</span>
                                </div>

                                <!-- Ride Details -->
                                <div class="custom-section">
                                    <div>
                                        @php
                                            $transportName = $ride->mean_of_transport->name ?? '';
                                            $icon = $icons[$transportName] ?? '❓'; // default fallback
                                        @endphp
                                        {{ $icon }} <span class="custom-label">Transport:</span> {{ $ride->transport_title }}
                                    </div>
                                    <div>🔹 <span class="custom-label">Reference Number:</span> {{ $ride->reference_id }}</div>
                                    <div>🔹 <span class="custom-label">Distance:</span> {{ $ride->distance }} km</div>
                                    <div>⏰ <span
                                            class="custom-label">Follow-up:</span> {{ $ride->date_and_time_of_followup }}
                                    </div>
                                </div>

                                <!-- Route -->
                                <div class="custom-section text-center">
                                    {{ $icon }} {{ $ride->pickup_location }} ⟶
                                    @php
                                        $locations = json_decode($ride->destination_location, true);
                                    @endphp
                                    {{ implode(' ⟶ ', $locations) }}
                                </div>

                                <!-- Contact + Details -->
                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('driver/chatting') }}" class="text-decoration-none">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon"
                                                     src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="tel:{{ $ride->driver->phone }}">📞
                                                        Call Carrier</a></li>
                                                <li><a class="dropdown-item" href="tel:{{ $ride->receiver_phone }}">📞
                                                        Call Receiver</a></li>
                                            </ul>
                                        </div>

                                        <a href="{{ url('user/ride-details?ride_id='.$ride->id) }}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                 title="View package details" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>

                                <!-- Cancel Button -->
                                <a href="#reasons" data-bs-toggle="offcanvas" data-id="{{ $ride->id }}"
                                   class="btn btn-danger w-100 mt-3 cancel_rideBtn">
                                    ❌ Cancel the Transport
                                </a>
                            </div>
                        @endforeach


                        {{-- 📦 Reserved Kilo Rides --}}
                        @foreach($pending_reserverd_kilo_rides as $kilo)
                            @php
                                $message = $kilo->message;
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
                                <div class="custom-header d-flex justify-content-between align-items-center">
                                    <span>👤 {{ $kilo->driver->name }}</span>
                                    <span>{{ $kilo->driverriderequest->price_currency }} {{ $kilo->totale_fare }}</span>
                                </div>

                                <!-- Badge -->
                                <div class="custom-section text-center">
                                    <span class="{{ $badgeClass }}">{{ $badgeText }}</span>
                                </div>

                                <!-- Travel Company (Airline) -->
                                @if($kilo->driverriderequest->airline)
                                    <div>✈️ <span class="fw-bold">Travel Company:</span>
                                        {{ $kilo->driverriderequest->airline }}</div>
                                @endif

                                <!-- Travel Company (Maritimes) -->
                                @if($kilo->driverriderequest->maritimes)
                                    <div>⛴️ <span class="fw-bold">Travel Company:</span>
                                        {{ $kilo->driverriderequest->maritimes }}
                                    </div>
                                @endif
                                <div>🔹 <span class="fw-bold">Reference Number:</span> {{ $kilo->reference_id }}
                                <div>🔹 <span class="fw-bold">Distance:</span> {{ $kilo->driverriderequest->distance }}km
                                <div>⏰ <span
                                        class="fw-bold">Follow-up:</span> {{ \Carbon\Carbon::parse($kilo->date_and_time_of_followup)->format('M d, Y H:i') }}
                                </div>
                                </div>
                                <div>⚖️ <span class="fw-bold">Reserved Kilos:</span> {{ $kilo->reserved_kilo }}</div>
                                <div>🛫 <span
                                        class="fw-bold">Departure:</span> {{ $kilo->driverriderequest->departure_datetime }}
                                </div>
                                <div>🛬 <span
                                        class="fw-bold">Arrival:</span> {{ $kilo->driverriderequest->arrival_datetime }}
                                </div>
                                <div>📅 <span
                                        class="fw-bold">Expiry:</span> {{ $kilo->driverriderequest->end_reservation_date }}
                                </div>
                                <div>📦 <span
                                        class="fw-bold">Reception Method:</span> {{ $kilo->driverriderequest->package_receiving_method }}
                                </div>

                                <div class="custom-section text-center">
                                    @if(!empty($kilo->driverriderequest->airline))
                                        ✈️
                                    @endif

                                    @if(!empty($kilo->driverriderequest->maritimes))
                                        🚢
                                    @endif
                                    {{ $kilo->driverriderequest->pickup_location }}
                                    ⟶ {{ implode(' ⟶ ', $kilo->driverriderequest->destination_location) }}
                                </div>

                                <!-- Contact + Details -->
                                <div class="custom-footer d-flex align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('driver/chatting') }}" class="text-decoration-none">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon"
                                                     src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="tel:{{ $kilo->driver->phone }}">📞
                                                        Call Carrier</a></li>
                                                <li><a class="dropdown-item" href="tel:{{ $kilo->receiver_phone }}">📞
                                                        Call Receiver</a></li>
                                            </ul>
                                        </div>

                                        <a href="{{ url('user/ride-details?ride_id='.$kilo->id) }}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                 title="View package details" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>

                                <!-- Actions -->
                                @if($kilo->message == 'Package Awaiting Collection')
                                    <a href="{{ url('user/start-package-delivery-collection-address/'.$kilo->id) }}"
                                       class="btn btn-warning w-100 mt-3">📦 Start Package delivery to Collection Address</a>
                                @endif
                                @if($kilo->message == 'delivery in progress to collection address')
                                    <a href="{{ url('user/request-package-collected/'.$kilo->id) }}"
                                       class="btn btn-warning w-100 mt-3">📦 Request Package Collected</a>
                                @endif
                                <a href="#reserved_kilo_reasons_before_pickup" data-bs-toggle="offcanvas" data-id="{{ $kilo->id }}" class="btn btn-danger w-100 mt-3 cancel_rideBtn">❌ Cancel the Transport</a>
                            </div>
                        @endforeach

                    </ul>
                </div>

                <div class="tab-pane fade" id="pending-offers-tab">
                    <ul class="my-ride-list">
                        @foreach($pending_offers as $offer)
                            <div class="custom-card">
                                <!-- Header -->
                                <div class="custom-header d-flex justify-content-between align-items-center">
                                    <span>👤 {{ $offer->user->name }}</span>
                                    <span>{{ $offer->fare_currency }} {{ $offer->fare }}</span>
                                </div>

                                <!-- Posted On -->
                                <div>
                                    <span
                                        class="custom-label">📅 Posted on:</span> {{ \Carbon\Carbon::parse($offer->created_at)->format('M d, Y') }}
                                </div>

                                <div class="custom-section text-center">
                                    <span class="badge badge-info">{{ $offer->status }}</span>
                                </div>

                                <!-- Ride Details -->
                                <div class="custom-section">
                                    <div>🚚 <span class="custom-label">Transport:</span> {{ $offer->transport_title }}</div>
                                    <div>🔹 <span class="custom-label">Reference Number:</span> {{ $offer->reference_id }}</div>
                                    <div>🔹 <span class="custom-label">Distance:</span> {{ $offer->distance }} km</div>
                                    <div>📅 <span
                                            class="custom-label">Expiry:</span> {{ \Carbon\Carbon::parse($offer->expiry)->format('M d, Y') }}
                                    </div>
                                </div>

                                <!-- Route -->
                                <div class="custom-section text-center">
                                    @if(!empty($offer->airline))
                                        ✈️
                                    @endif

                                    @if(!empty($offer->maritimes))
                                        🚢
                                    @endif
                                    {{ $offer->pickup_location }} ⟶
                                    @php
                                        $locations = json_decode($offer->destination_location, true);
                                    @endphp
                                    {{ implode(' ⟶ ', $locations) }}
                                </div>

                                <!-- Footer -->
                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('user/get-pending-driver-fare-request?userriderequest_id='.$offer->id) }}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                 title="View Carriers Requests" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="text-center my-3">
                                    <a href="{{ url('user/get-pending-driver-fare-request?userriderequest_id='.$offer->id) }}"
                                       class="btn btn-success w-100 mb-2">✅ View Carriers Requests</a>
                                    <a href="#offers" data-bs-toggle="offcanvas" data-id="{{ $offer->id }}"
                                       class="btn btn-danger w-100 cancel_offerBtn">🔴 Cancel the Offer</a>
                                </div>
                            </div>
                        @endforeach

                    </ul>
                </div>

                <div class="tab-pane fade" id="expired-offers-tab">
                    <ul class="my-ride-list">
                        @foreach($expired_offers as $offer)
                            <div class="custom-card">
                                <!-- Header -->
                                <div class="custom-header d-flex justify-content-between align-items-center">
                                    <span>👤 {{ $offer->user->name }}</span>
                                    <span>{{ $offer->fare_currency }} {{ $offer->fare }}</span>
                                </div>

                                <!-- Posted On -->
                                <div>
                                    <span
                                        class="custom-label">📅 Posted on:</span> {{ \Carbon\Carbon::parse($offer->created_at)->format('M d, Y') }}
                                </div>

                                <div class="custom-section text-center">
                                    <span class="badge badge-info">{{ $offer->status }}</span>
                                </div>

                                <!-- Ride Details -->
                                <div class="custom-section">
                                    <div>🚚 <span class="custom-label">Transport:</span> {{ $offer->transport_title }}</div>
                                    <div>🔹 <span class="custom-label">Reference Number:</span> {{ $offer->reference_id }}</div>
                                    <div>🔹 <span class="custom-label">Distance:</span> {{ $offer->distance }} km</div>
                                    <div>📅 <span
                                            class="custom-label">Expiry:</span> {{ \Carbon\Carbon::parse($offer->expiry)->format('M d, Y') }}
                                    </div>
                                </div>

                                <!-- Route -->
                                <div class="custom-section text-center">
                                    @if(!empty($offer->airline))
                                        ✈️
                                    @endif

                                    @if(!empty($offer->maritimes))
                                        🚢
                                    @endif
                                    {{ $offer->pickup_location }} ⟶
                                    @php
                                        $locations = json_decode($offer->destination_location, true);
                                    @endphp
                                    {{ implode(' ⟶ ', $locations) }}
                                </div>

                                <!-- Footer -->
                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('user/get-pending-driver-fare-request?userriderequest_id='.$offer->id) }}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                 title="View Carriers Requests" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="text-center my-3">
                                    <a href="{{ url('user/get-pending-driver-fare-request?userriderequest_id='.$offer->id) }}"
                                       class="btn btn-success w-100 mb-2">Details</a>
                                </div>
                            </div>
                        @endforeach

                    </ul>
                </div>

                <div class="tab-pane fade" id="complete-tab">
                    <ul class="my-ride-list">
                        @foreach($completed_rides as $ride)
                            <div class="custom-card">
                                {{-- Header: User + Fare --}}
                                <div class="custom-header d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <span>👤 {{ $ride->driver->name ?? 'Unknown User' }}</span>
                                    </div>
                                    <span>{{ $ride->fare_currency }} {{ $ride->fare }}</span>
                                </div>

                                {{-- Posted On --}}
                                <div>
                                    <span class="custom-label">📅 Posted on:</span>
                                    {{ $ride->created_at->format('M d, Y') }}
                                </div>

                                {{-- Ride Details --}}
                                <div class="custom-section">
                                    @php
                                        $transportName = $ride->mean_of_transport->name ?? '';
                                        $icon = $icons[$transportName] ?? '❓'; // default fallback
                                    @endphp
                                    <div>{{ $icon }} <span class="custom-label">Title:</span> {{ $ride->transport_title }}</div>
                                    <div>📏 <span class="custom-label">Reference Number:</span> {{ $ride->reference_id }}</div>
                                    <div>📏 <span class="custom-label">Distance:</span> {{ $ride->distance }} km</div>
                                    <div><span class="custom-label">Follow-up:</span> {{ \Illuminate\Support\Carbon::parse($ride->date_and_time_of_followup)->format('M d, Y') }}</div>
                                </div>

                                {{-- Route --}}
                                <div class="custom-section text-center">
                                    {{ $icon }} {{ $ride->pickup_location }}
                                    @php
                                        $locations = json_decode($ride->destination_location, true);
                                    @endphp
                                    @if(!empty($locations))
                                        ⟶ {{ implode(', ', $locations) }}
                                    @endif
                                </div>

                                {{-- Footer / Actions --}}
                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{url('driver/chatting')}}" class="text-decoration-none">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon"
                                                     src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="tel:{{ $ride->driver->phone }}">📞
                                                        Call Sender</a></li>
                                                <li><a class="dropdown-item" href="tel:{{ $ride->receiver_phone }}">📞
                                                        Call Receiver</a></li>
                                            </ul>
                                        </div>

                                        <a href="{{url('user/ride-details?ride_id='.$ride->id)}}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                 title="View package details" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach($reserved_kilo_completed_rides as $ride)
                            <div class="custom-card">
                                {{-- Header: User + Price --}}
                                <div class="custom-header d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <span>👤 {{ $ride->driver->name }}</span>
                                    </div>
                                    <span>{{ $ride->driverriderequest->price_currency }}{{ $ride->price_per_kilo }}/Kilo</span>
                                </div>

                                {{-- Posted On / Follow-up Date --}}
                                <div>
                                    <span class="custom-label">📅 Posted on:</span>
                                    {{ \Carbon\Carbon::parse($ride->created_at)->format('M d, Y') }}
                                </div>

                                {{-- Ride Type / Badge --}}
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

                                {{-- Ride Details --}}
                                <div class="custom-section">
                                    @if($ride->driverriderequest->airline)
                                        <div>🔹 <span
                                                class="custom-label">Travel Company:</span> {{ $ride->driverriderequest->airline }}
                                        </div>
                                    @endif
                                    @if($ride->driverriderequest->maritimes)
                                        <div>🔹 <span
                                                class="custom-label">Travel Company:</span> {{ $ride->driverriderequest->maritimes }}
                                        </div>
                                    @endif
                                        <div>
                                            <span class="custom-label">🔹  Reference Number:</span>
                                            {{ $ride->driverriderequest->reference_id }}
                                        </div>
                                        <div>
                                            <span class="custom-label">📏  Distance:</span>
                                            {{ $ride->driverriderequest->distance }} Km
                                        </div>
                                    <div>
                                        <span class="custom-label">📅  Follow-up:</span>
                                        {{ \Carbon\Carbon::parse($ride->date_and_time_of_followup)->format('M d, Y') }}
                                    </div>
                                    <div>🔹 <span class="custom-label">Reserved Kilos:</span>
                                        {{ $ride->driverriderequest->total_transport_capacity - $ride->driverriderequest->available_transport_capacity }}
                                    </div>
                                    <div>📅 <span
                                            class="custom-label">Departure:</span> {{ $ride->driverriderequest->departure_datetime->format('M d, Y H:i') }}
                                    </div>
                                    <div>📅 <span
                                            class="custom-label">Arrival:</span> {{ $ride->driverriderequest->arrival_datetime?->format('M d, Y H:i') }}
                                    </div>
                                    <div>📅 <span
                                            class="custom-label">Expiry:</span> {{ $ride->driverriderequest->end_reservation_date?->format('M d, Y H:i') }}
                                    </div>
                                    <div>🛡️ <span
                                            class="custom-label">Reception Method:</span> {{ $ride->driverriderequest->package_receiving_method }}
                                    </div>
                                </div>

                                {{-- Route --}}
                                <div class="custom-section text-center">
                                    @if(!empty($ride->driverriderequest->airline))
                                        ✈️
                                    @endif

                                    @if(!empty($ride->driverriderequest->maritimes))
                                        🚢
                                    @endif
                                    {{ $ride->driverriderequest->pickup_location }}
                                    @if(!empty($ride->driverriderequest->destination_location))
                                        ⟶ {{ implode(', ', $ride->driverriderequest->destination_location) }}
                                    @endif
                                </div>

                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{url('driver/chatting')}}" class="text-decoration-none">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon"
                                                     src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="tel:{{ $ride->driver->phone }}">📞
                                                        Call Sender</a></li>
                                                <li><a class="dropdown-item" href="tel:{{ $ride->receiver_phone }}">📞
                                                        Call Receiver</a></li>
                                            </ul>
                                        </div>

                                        <a href="{{url('user/reserved-kilo-ride-details?ride_id='.$ride->id)}}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                 title="View package details" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </ul>
                </div>

                <div class="tab-pane fade" id="cancel-tab">
                    <ul class="my-ride-list">

                        @foreach($cancelled_rides as $cancelled_ride)
                            <div class="custom-card">
                                {{-- Header: User + Fare --}}
                                <div class="custom-header d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <span>👤 {{ $cancelled_ride->driver->name ?? 'Unknown User' }}</span>
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
                                    @php
                                        $transportName = $cancelled_ride->mean_of_transport->name ?? '';
                                        $icon = $icons[$transportName] ?? '❓'; // default fallback
                                    @endphp
                                    <div>{{ $icon }} <span
                                            class="custom-label">Title:</span> {{ $cancelled_ride->transport_title }}
                                    </div>
                                    <div>📏 <span class="custom-label">Reference Number:</span> {{ $cancelled_ride->reference_id }}
                                    </div>
                                    <div>📏 <span class="custom-label">Distance:</span> {{ $cancelled_ride->distance }}km
                                    </div>
                                    <div>
                                        <span class="custom-label">Follow-up:</span> {{ \Illuminate\Support\Carbon::parse($cancelled_ride->date_and_time_of_followup)->format('M d, Y') }}
                                    </div>
                                </div>

                                {{-- Route --}}
                                <div class="custom-section text-center">
                                    {{ $icon }} {{ $cancelled_ride->pickup_location }}
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
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon"
                                                     src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                       href="tel:{{ $cancelled_ride->driver->phone }}">📞 Call Sender</a>
                                                </li>
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
                            </div>
                        @endforeach

                        @foreach($reserved_kilo_cancelled_rides as $ride)
                            <div class="custom-card">
                                {{-- Header: User + Price --}}
                                <div class="custom-header d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <span>👤 {{ $ride->driver->name }}</span>
                                    </div>
                                    <span>{{ $ride->driverriderequest->price_currency }}{{ $ride->price_per_kilo }}/Kilo</span>
                                </div>

                                {{-- Posted On / Follow-up Date --}}
                                <div>
                                    <span class="custom-label">📅 Posted on:</span>
                                    {{ \Carbon\Carbon::parse($ride->created_at)->format('M d, Y') }}
                                </div>

                                {{-- Ride Type / Badge --}}
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

                                {{-- Ride Details --}}
                                <div class="custom-section">
                                    @if($ride->driverriderequest->airline)
                                        <div>🔹 <span
                                                class="custom-label">Travel Company:</span> {{ $ride->driverriderequest->airline }}
                                        </div>
                                    @endif
                                    @if($ride->driverriderequest->maritimes)
                                        <div>🔹 <span
                                                class="custom-label">Travel Company:</span> {{ $ride->driverriderequest->maritimes }}
                                        </div>
                                    @endif
                                        <div>
                                            <span class="custom-label">📏  Reference Number:</span>
                                            {{ $ride->reference_id }}
                                        </div>
                                        <div>
                                            <span class="custom-label">📏  Distance:</span>
                                            {{ $ride->driverriderequest->distance }} Km
                                        </div>
                                    <div>
                                        <span class="custom-label">📅  Follow-up:</span>
                                        {{ \Carbon\Carbon::parse($ride->date_and_time_of_followup)->format('M d, Y') }}
                                    </div>
                                    <div>🔹 <span class="custom-label">Reserved Kilos:</span>
                                        {{ $ride->driverriderequest->total_transport_capacity - $ride->driverriderequest->available_transport_capacity }}
                                    </div>
                                    <div>📅 <span
                                            class="custom-label">Departure:</span> {{ $ride->driverriderequest->departure_datetime->format('M d, Y H:i') }}
                                    </div>
                                    <div>📅 <span
                                            class="custom-label">Arrival:</span> {{ $ride->driverriderequest->arrival_datetime?->format('M d, Y H:i') }}
                                    </div>
                                    <div>📅 <span
                                            class="custom-label">Expiry:</span> {{ $ride->driverriderequest->end_reservation_date?->format('M d, Y H:i') }}
                                    </div>
                                    <div>🛡️ <span
                                            class="custom-label">Reception Method:</span> {{ $ride->driverriderequest->package_receiving_method }}
                                    </div>
                                </div>

                                {{-- Route --}}
                                <div class="custom-section text-center">
                                    @if(!empty($ride->driverriderequest->airline))
                                        ✈️
                                    @endif

                                    @if(!empty($ride->driverriderequest->maritimes))
                                        🚢
                                    @endif
                                    {{ $ride->driverriderequest->pickup_location }}
                                    @if(!empty($ride->driverriderequest->destination_location))
                                        ⟶ {{ implode(', ', $ride->driverriderequest->destination_location) }}
                                    @endif
                                </div>

                                <div class="custom-footer d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{url('driver/chatting')}}" class="text-decoration-none">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>

                                        <div class="dropdown">
                                            <a class="btn btn-light p-0" href="#" role="button"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="img-fluid communication-icon"
                                                     src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="tel:{{ $ride->driver->phone }}">📞
                                                        Call Sender</a></li>
                                                <li><a class="dropdown-item" href="tel:{{ $ride->receiver_phone }}">📞
                                                        Call Receiver</a></li>
                                            </ul>
                                        </div>

                                        <a href="{{url('user/reserved-kilo-ride-details?ride_id='.$ride->id)}}">
                                            <img src="{{ asset('public/assets/images/view-detail-image.png') }}"
                                                 title="View package details" width="30px" alt="loading">
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

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
                        <input type="hidden" name="is_user_cancelled" value="true">
                        <ul class="reasons-list">
                            <li class="reasons-box">
                                <div class="form-check">
                                    <label class="form-check-label" for="fixed01">
                                        <img class="img-fluid reasons-icon"
                                             src="{{asset('assets/images/svg/user-cross.svg')}}"
                                             alt="user-cross"> Recipient Unavailable</label>
                                    <input class="form-check-input" type="radio" name="reason"
                                           value="Recipient Unavailable" id="fixed01">
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
                            <a href="{{url('user/my-rides')}}" class="btn theme-btn w-100 mt-0">Close</a>
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
                        <input type="hidden" name="is_user_cancelled" value="true">
                        <ul class="reasons-list">
                            <li class="reasons-box">
                                <div class="form-check">
                                    <label class="form-check-label" for="fixed01">
                                        <img class="img-fluid reasons-icon"
                                             src="{{asset('assets/images/svg/user-cross.svg')}}"
                                             alt="user-cross"> Change of plan (package entrusted to another carrier)</label>
                                    <input class="form-check-input" type="radio" name="reason"
                                           value="Change of plan (package entrusted to another carrier)" id="fixed01">
                                </div>
                            </li>
                            <li class="reasons-box">
                                <div class="form-check">
                                    <label class="form-check-label" for="fixed03">
                                        <img class="img-fluid reasons-icon"
                                             src="{{asset('assets/images/svg/security-time.svg')}}"
                                             alt="security"> Error in the announcement (weight, dimensions, contents)</label>
                                    <input class="form-check-input" type="radio" name="reason" value="Error in the announcement (weight, dimensions, contents)"
                                           id="fixed03">
                                </div>
                            </li>
                            <li class="reasons-box">
                                <div class="form-check">
                                    <label class="form-check-label" for="fixed01">
                                        <img class="img-fluid reasons-icon"
                                             src="{{asset('assets/images/svg/user-cross.svg')}}"
                                             alt="user-cross"> Sender late or unavailable for the appointment</label>
                                    <input class="form-check-input" type="radio" name="reason"
                                           value="Sender late or unavailable for the appointment" id="fixed01">
                                </div>
                            </li>
                            <li class="reasons-box">
                                <div class="form-check">
                                    <label class="form-check-label" for="fixed03">
                                        <img class="img-fluid reasons-icon"
                                             src="{{asset('assets/images/svg/security-time.svg')}}"
                                             alt="security"> Voluntary cancellation (no need to ship the package)</label>
                                    <input class="form-check-input" type="radio" name="reason" value="Voluntary cancellation (no need to ship the package)"
                                           id="fixed03">
                                </div>
                            </li>
                            <li class="reasons-box">
                                <div class="form-check">
                                    <label class="form-check-label" for="fixed01">
                                        <img class="img-fluid reasons-icon"
                                             src="{{asset('assets/images/svg/user-cross.svg')}}"
                                             alt="user-cross"> Package not ready (packaging not finished, contents incomplete)</label>
                                    <input class="form-check-input" type="radio" name="reason"
                                           value="Package not ready (packaging not finished, contents incomplete)" id="fixed01">
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
        <!-- reserved kilo reasons offcanvas end -->

        <!-- reserved kilo reasons  offcanvas starts -->
        <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="reserved_kilo_reasons_after_pickup">
            <div class="offcanvas-body p-0">
                <div class="alert-part">
                    <div class="title-content">
                        <h3 class="justify-content-center">Why do you want to Request Return?</h3>
                    </div>

                    <form class="theme-form mt-0" action="{{url('user/return-reserved-kilo-parcel')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" class="offer_id">
                        <input type="hidden" name="is_user_cancelled" value="true">
                        <ul class="reasons-list">
                            <li class="reasons-box">
                                <div class="form-check">
                                    <label class="form-check-label" for="fixed01">
                                        <img class="img-fluid reasons-icon"
                                             src="{{asset('assets/images/svg/user-cross.svg')}}"
                                             alt="user-cross"> Carrier refuses the package (non-compliant, too heavy, dangerous)</label>
                                    <input class="form-check-input" type="radio" name="reason"
                                           value="Carrier refuses the package (non-compliant, too heavy, dangerous)" id="fixed01">
                                </div>
                            </li>
                            <li class="reasons-box">
                                <div class="form-check">
                                    <label class="form-check-label" for="fixed03">
                                        <img class="img-fluid reasons-icon"
                                             src="{{asset('assets/images/svg/security-time.svg')}}"
                                             alt="security"> Broken trust (sender no longer wishes to hand over the package to the carrier)</label>
                                    <input class="form-check-input" type="radio" name="reason" value="Broken trust (sender no longer wishes to hand over the package to the carrier)"
                                           id="fixed03">
                                </div>
                            </li>
                            <li class="reasons-box">
                                <div class="form-check">
                                    <label class="form-check-label" for="fixed03">
                                        <img class="img-fluid reasons-icon"
                                             src="{{asset('assets/images/svg/security-time.svg')}}"
                                             alt="security"> Missing documents (customs, invoice, supporting documents)</label>
                                    <input class="form-check-input" type="radio" name="reason" value="Missing documents (customs, invoice, supporting documents)"
                                           id="fixed03">
                                </div>
                            </li>
                            <li class="reasons-box">
                                <div class="form-check">
                                    <label class="form-check-label" for="fixed03">
                                        <img class="img-fluid reasons-icon"
                                             src="{{asset('assets/images/svg/security-time.svg')}}"
                                             alt="security"> Carrier does not show up for the appointment</label>
                                    <input class="form-check-input" type="radio" name="reason" value="Carrier does not show up for the appointment"
                                           id="fixed03">
                                </div>
                            </li>
                        </ul>
                        <div class="mt-5">
                            <a href="{{url('user/my-rides')}}" class="btn theme-btn w-100 mt-0">Close</a>
                            <button type="submit" class="btn theme-btn w-100 mt-1">Return Parcel</button>
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

                    <form class="theme-form mt-0" action="{{url('driver/cancel-offer')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" class="offer_id">
                        <ul class="reasons-list">
                            <li class="reasons-box">
                                <div class="form-check">
                                    <label class="form-check-label" for="fixed01">
                                        <img class="img-fluid reasons-icon"
                                             src="{{asset('assets/images/svg/user-cross.svg')}}"
                                             alt="user-cross"> Recipient Unavailable</label>
                                    <input class="form-check-input" type="radio" name="reason"
                                           value="Recipient Unavailable" id="fixed01">
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
                            <a href="{{url('user/my-rides')}}" class="btn theme-btn w-100 mt-0">Close</a>
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
                        <input type="hidden" name="is_user_cancelled" value="true">
                        <div class="modal-body">
                            <div class="form-group mt-3">
                                <label class="form-label mb-2" for="InputComments">Reasons</label>
                                <textarea class="form-control white-background" required id="InputComments"
                                          name="reason"
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

        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Cancel Transport</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="theme-form mt-0" action="{{url('driver/cancel-offer')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" class="offer_id">
                        <div class="modal-body">
                            <div class="form-group mt-3">
                                <label class="form-label mb-2" for="InputComments">Reasons</label>
                                <textarea class="form-control white-background" required id="InputComments"
                                          name="reason"
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
