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

        .badge-warning { background-color: #ffc107; color: #212529; }
        .badge-info    { background-color: #17a2b8; color: #fff; }
        .badge-success { background-color: #28a745; color: #fff; }
        .badge-secondary { background-color: #6c757d; color: #fff; }
        .badge-light   { background-color: #f8f9fa; color: #212529; }

        .my-ride-tab-btn{
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

@endsection

@section('content')
    <!-- header starts -->
    @include('user-app.partials.header')
    <!-- header end -->

    <!-- my ride section starts -->
    <section class="section-b-space">

        <ul class="nav nav-pills my-ride-tab w-100 border-0 m-0" id="Tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="btn btn-warning my-ride-tab-btn active" id="pill-active-tab" data-bs-toggle="pill"
                    data-bs-target="#active-tab">In Progress</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-primary my-ride-tab-btn" id="pill-pending-tab" data-bs-toggle="pill"
                    data-bs-target="#pending-tab">Accepted</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link " id="pill-pending-offer-tab" data-bs-toggle="pill"
                        data-bs-target="#pending-offers-tab">On Hold</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="btn btn-secondary my-ride-tab-btn" id="pill-expired-offers-tab" data-bs-toggle="pill"
                        data-bs-target="#expired-offers-tab">Expired</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="btn btn-success my-ride-tab-btn" id="pill-complete-tab" data-bs-toggle="pill" data-bs-target="#complete-tab">
                    Finished</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-danger my-ride-tab-btn" id="pill-cancel-tab" data-bs-toggle="pill" data-bs-target="#cancel-tab">Cancelled</button>
            </li>
        </ul>
        <div class="custom-container">
            <div class="tab-content ride-content" id="TabContent">
                <div class="tab-pane fade active show" id="active-tab">

                    <ul class="my-ride-list" style="border: 1px solid orange; border-radius: 8px;">
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

                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="#" class="my-ride-img">
                                            <img class="img-fluid profile-img" src="{{ $active_ride->driver->profile ? asset('storage/'.$active_ride->user->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="#">
                                                    <h6 class="title-color fw-medium">{{ $active_ride->driver->name }}</h6>
                                                </a>
                                                <span class="badge badge-success text-white">{{ $active_ride->created_at }}</span>
                                                <h5 class="fw-mediun success-color">{{ $active_ride->fare_currency}} {{ $active_ride->fare }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <span class="{{ $badgeClass }}">{{ $badgeText }}</span>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div>
                                                <h6 class="fw-normal title-color">{{ $active_ride->date_and_time_of_followup }}</h6>
                                                <h6 class="fw-normal title-color">{{ $active_ride->distance }} km</h6>
                                            </div>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
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
                                                <a href="{{url('user/ride-details?ride_id='.$active_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <p class="fw-bold">{{ $active_ride->transport_title }}</p>
{{--                                            <p>Expiry Date :- {{ $active_ride->expiry }}</p>--}}
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $active_ride->pickup_location }}</h5>
                                                </div>
                                            </li>
                                            @php
                                                $locations = json_decode($active_ride->destination_location, true); // returns array
                                            @endphp
                                            @foreach($locations as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <a href="{{ url('user/track-ride/'. $active_ride->id) }}" class="btn theme-btn w-100 auth-btn mt-3">Track your Carrier</a>
                                    {{--                                    @if($active_ride->status == 'user_cancelled_ride' || $active_ride->status == 'carrier_cancelled_ride')--}}
                                    @if( ($active_ride->status == 'active' || $active_ride->message == 'delivery in progress') && $active_ride->message != 'On the way to pickup' && $active_ride->message != 'Parcel returned' && $active_ride->message !='Delivery in progress, parcel return requested' && $active_ride->message != 'transport completed awaiting validation' && $active_ride->message != 'Package return in progress')
                                        <a href="{{ url('driver/return-parcel/'. $active_ride->id) }}" class="btn btn-warning w-100 auth-btn mt-3">Request the Return Package</a>
                                    @else
                                        @if($active_ride->message == 'Parcel returned')
                                            @php
                                                $signedUrl = URL::temporarySignedRoute(
                                                    'user.package.returned', // This should match your named route
                                                    now()->addMinutes(60),
                                                    [
                                                        'ride' => $active_ride->id,
                                                        'token' => sha1($active_ride->receiver_email),
                                                    ]
                                                );
                                            @endphp
                                            <a href="{{ $signedUrl }}" class="btn btn-warning w-100 auth-btn mt-3">
                                                ✅ Confirm Package Return
                                            </a>
                                        @elseif($active_ride->message != 'Delivery in progress, parcel return requested' && $active_ride->message != 'transport completed awaiting validation' && $active_ride->message != 'Package return in progress')
                                            {{--                                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="{{ $active_ride->id }}" class="btn btn-danger w-100 mt-3 cancel_rideBtn">Cancel the Transport</a>--}}
                                            <a href="#reasons" data-bs-toggle="offcanvas" data-id="{{ $active_ride->id }}" class="btn btn-danger w-100 mt-3 cancel_rideBtn">Cancel the Transport</a>
                                        @elseif(trim($active_ride->message) === 'transport completed awaiting validation')
                                            @php
                                                $signedUrl = URL::temporarySignedRoute(
                                                  'user.ride.complete', // This should match your named route
                                                  now()->addMinutes(60),
                                                  [
                                                      'ride' => $active_ride->id,
                                                      'token' => sha1($active_ride->receiver_email),
                                                  ]
                                              );
                                            @endphp
                                            <a href="{{ $signedUrl }}" class="btn btn-success w-100 auth-btn mt-3">
                                                ✅ Confirm Ride Completion
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </li>
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
                                <li>
                                    <div class="my-ride-box">
                                        <div class="my-ride-head d-flex align-items-center w-100" style="min-width: 0;">
                                            <!-- Profile Image -->
                                            <a href="#" class="my-ride-img flex-shrink-0">
                                                <img class="img-fluid profile-img"
                                                     style="border-radius: 100%; width:40px; height:40px; object-fit:cover;"
                                                     src="{{ $active_reserverd_kilo_ride->driver->profile ? asset('storage/'.$active_reserverd_kilo_ride->driver->profile) : asset('assets/images/profile/p5.png')}}"
                                                     alt="p5">
                                            </a>

                                            <!-- Ride Content -->
                                            <div class="d-flex align-items-center flex-grow-1 ms-2" style="min-width: 0;">
                                                <!-- Driver Name -->
                                                <h6 class="title-color fw-medium mb-0 me-2 flex-shrink-0">
                                                    {{ $active_reserverd_kilo_ride->driver->name }}
                                                </h6>

                                                <!-- Badge (can grow in height if text is long) -->
                                                <span class="badge badge-success text-white me-2 flex-grow-1 text-center"
                                                      style="white-space: normal;">
                                                I Travel - I Offer My Kilos Of Luggage For Sale
                                            </span>

                                                <!-- Price (sticks to the right, vertically centered) -->
                                                <h5 class="fw-medium success-color mb-0 flex-shrink-0 ms-2">
                                                    {{ $active_reserverd_kilo_ride->driverriderequest->price_currency }}{{ $active_reserverd_kilo_ride->totale_fare }}
                                                </h5>
                                            </div>
                                        </div>

                                        <span class="{{ $badgeClass }} mt-2">{{ $badgeText }}</span>

                                        <div class="my-ride-details">
                                            <div class="ride-info">
                                                <div>
                                                    <h6 class="fw-normal title-color">{{ \Carbon\Carbon::parse($active_reserverd_kilo_ride->date_and_time_of_followup)->format('Y d M H:i:s') }}</h6>
                                                    <h6 class="fw-normal title-color">{{ $active_reserverd_kilo_ride->driverriderequest->distance }} km</h6>
                                                </div>
                                                <div class="flex-align-center gap-2">
                                                    <a href="{{url('driver/chatting')}}">
                                                        <img class="img-fluid communication-icon"
                                                             src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                                    </a>
                                                    <div class="dropdown">
                                                        <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="tel:{{ $active_reserverd_kilo_ride->driver->phone }}">📞 Call Carrier</a></li>
                                                            <li><a class="dropdown-item" href="tel:{{ $active_reserverd_kilo_ride->userfarerequest->receiver_phone }}">📞 Call Receiver</a></li>
                                                        </ul>
                                                    </div>
                                                    <a href="{{url('user/reserved-kilo-ride-details?ride_id='.$active_reserverd_kilo_ride->id)}}">
                                                        <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                @if($active_reserverd_kilo_ride->driverriderequest->airline)
                                                    <p><span class="fw-bold">Travel Company</span>
                                                        :- {{ $active_reserverd_kilo_ride->driverriderequest->airline }}</p>
                                                @endif
                                                @if($active_reserverd_kilo_ride->driverriderequest->maritimes)
                                                    <p><span class="fw-bold">Travel Company</span>
                                                        :- {{ $active_reserverd_kilo_ride->driverriderequest->maritimes }}</p>
                                                @endif
                                                <p> <span class="fw-bold">Number of Kilos Reserved</span> :- {{ $active_reserverd_kilo_ride->reserved_kilo }}</p>
                                                <p> <span class="fw-bold">Departure Date</span> :- {{ $active_reserverd_kilo_ride->driverriderequest->departure_datetime }}</p>
                                                <p> <span class="fw-bold">Arrival Date</span> :- {{ $active_reserverd_kilo_ride->driverriderequest->arrival_datetime }}</p>
                                                <p> <span class="fw-bold">Expiry Date</span> :- {{ $active_reserverd_kilo_ride->driverriderequest->end_reservation_date }}</p>
                                                <p> <span class="fw-bold">method of reception</span> :- {{ $active_reserverd_kilo_ride->driverriderequest->package_receiving_method }}</p>
                                            </div>
                                            <ul class="ride-location-listing">
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                             alt="location">
                                                        <h5 class="fw-light title-color">{{ $active_reserverd_kilo_ride->driverriderequest->pickup_location }}</h5>
                                                    </div>
                                                </li>
                                                @foreach($active_reserverd_kilo_ride->driverriderequest->destination_location as $location)
                                                    <li class="border-0 shadow-none">
                                                        <div class="location-box">
                                                            <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                            <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                            </h5>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @if( ($active_reserverd_kilo_ride->status == 'active' || $active_reserverd_kilo_ride->message == 'delivery in progress') && $active_reserverd_kilo_ride->message != 'On the way to pickup' && $active_reserverd_kilo_ride->message != 'Parcel returned' && $active_reserverd_kilo_ride->message !='Delivery in progress, parcel return requested' && $active_reserverd_kilo_ride->message != 'transport completed awaiting validation' && $active_reserverd_kilo_ride->message != 'Package return in progress')
{{--                                            <a href="{{ url('driver/return-parcel/'. $active_ride->id) }}" class="btn btn-warning w-100 auth-btn mt-3">Request the Return Package</a>--}}
                                        @else
                                            @if($active_reserverd_kilo_ride->message == 'Parcel returned')
                                                @php
                                                    $signedUrl = URL::temporarySignedRoute(
                                                        'user.package.returned', // This should match your named route
                                                        now()->addMinutes(60),
                                                        [
                                                            'ride' => $active_reserverd_kilo_ride->id,
                                                            'token' => sha1($active_reserverd_kilo_ride->receiver_email),
                                                        ]
                                                    );
                                                @endphp
{{--                                                <a href="{{ $signedUrl }}" class="btn btn-warning w-100 auth-btn mt-3">--}}
{{--                                                    ✅ Confirm Package Return--}}
{{--                                                </a>--}}
                                            @elseif($active_reserverd_kilo_ride->message != 'Delivery in progress, parcel return requested' && $active_reserverd_kilo_ride->message != 'transport completed awaiting validation' && $active_reserverd_kilo_ride->message != 'Package return in progress')
{{--                                                <a href="#reasons" data-bs-toggle="offcanvas" data-id="{{ $active_ride->id }}" class="btn btn-danger w-100 mt-3 cancel_rideBtn">Cancel the Transport</a>--}}
                                            @elseif(trim($active_reserverd_kilo_ride->message) === 'transport completed awaiting validation')
                                                <a href="{{ route('user.reserved_kilo_ride.complete',['ride' => $active_reserverd_kilo_ride->id]) }}" class="btn btn-success w-100 auth-btn mt-3">
                                                    ✅ Confirm Ride Completion
                                                </a>
                                            @endif
                                        @endif

{{--                                        <a href="#reasons" data-bs-toggle="offcanvas" data-id="{{ $active_reserverd_kilo_ride->id }}" class="btn btn-danger w-100 mt-3 cancel_rideBtn">Cancel the Transport</a>--}}
                                    </div>
                                </li>
                            @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="pending-tab">
                    <ul class="my-ride-list" style="border: 1px solid black; border-radius: 8px;">
                        @php
                            $badgeClass = 'badge badge-info'; // base class
                            $badgeText = 'Package Awaiting Collection';
                        @endphp
                        @foreach($pending_rides as $pending_ride)
                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="#" class="my-ride-img">
                                            <img class="img-fluid profile-img" style="border-radius: 100%;" src="{{ $pending_ride->user->profile ? asset('storage/'.$pending_ride->user->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="#">
                                                    <h6 class="title-color fw-medium">{{ $pending_ride->driver->name }}</h6>
                                                </a>
                                                <span class="badge badge-success text-white">{{ $pending_ride->created_at }}</span>
                                                <h5 class="fw-mediun success-color">{{ $pending_ride->fare_currency}} {{ $pending_ride->fare }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <span class="{{ $badgeClass }}">{{ $badgeText }}</span>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div>
                                                <h6 class="fw-normal title-color">{{ $pending_ride->date_and_time_of_followup }}</h6>
                                                <h6 class="fw-normal title-color">{{ $pending_ride->distance }} km</h6>
                                            </div>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                                </a>
                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="tel:{{ $pending_ride->driver->phone }}">📞 Call Carrier</a></li>
                                                        <li><a class="dropdown-item" href="tel:{{ $pending_ride->receiver_phone }}">📞 Call Receiver</a></li>
                                                    </ul>
                                                </div>
                                                <a href="{{url('user/ride-details?ride_id='.$pending_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
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
                                                    <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
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
                                                        <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <a href="#reasons" data-bs-toggle="offcanvas" data-id="{{ $pending_ride->id }}" class="btn btn-danger w-100 mt-3 cancel_rideBtn">Cancel the Transport</a>
                                </div>
                            </li>
                        @endforeach
                        @foreach($pending_reserverd_kilo_rides as $pending_reserverd_kilo_ride)
                            @php
                                $message = $pending_reserverd_kilo_ride->message;
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
                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head d-flex align-items-center w-100" style="min-width: 0;">
                                        <!-- Profile Image -->
                                        <a href="#" class="my-ride-img flex-shrink-0">
                                            <img class="img-fluid profile-img"
                                                 style="border-radius: 100%; width:40px; height:40px; object-fit:cover;"
                                                 src="{{ $pending_reserverd_kilo_ride->driver->profile ? asset('storage/'.$pending_reserverd_kilo_ride->driver->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <!-- Ride Content -->
                                        <div class="d-flex align-items-center flex-grow-1 ms-2" style="min-width: 0;">
                                            <!-- Driver Name -->
                                            <h6 class="title-color fw-medium mb-0 me-2 flex-shrink-0">
                                                {{ $pending_reserverd_kilo_ride->driver->name }}
                                            </h6>

                                            <!-- Badge (can grow in height if text is long) -->
                                            <span class="badge badge-success text-white me-2 flex-grow-1 text-center"
                                                  style="white-space: normal;">
                                                I Travel - I Offer My Kilos Of Luggage For Sale
                                            </span>

                                            <!-- Price (sticks to the right, vertically centered) -->
                                            <h5 class="fw-medium success-color mb-0 flex-shrink-0 ms-2">
                                                {{ $pending_reserverd_kilo_ride->driverriderequest->price_currency }}{{ $pending_reserverd_kilo_ride->totale_fare }}
                                            </h5>
                                        </div>
                                    </div>

                                    <span class="{{ $badgeClass }} mt-2">{{ $badgeText }}</span>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div>
                                                <h6 class="fw-normal title-color">{{ \Carbon\Carbon::parse($pending_reserverd_kilo_ride->date_and_time_of_followup)->format('Y d M H:i:s') }}</h6>
                                                <h6 class="fw-normal title-color">{{ $pending_reserverd_kilo_ride->driverriderequest->distance }} km</h6>
                                            </div>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                                </a>
                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="tel:{{ $pending_reserverd_kilo_ride->driver->phone }}">📞 Call Carrier</a></li>
                                                        <li><a class="dropdown-item" href="tel:{{ $pending_reserverd_kilo_ride->userfarerequest->receiver_phone }}">📞 Call Receiver</a></li>
                                                    </ul>
                                                </div>
                                                <a href="{{url('user/reserved-kilo-ride-details?ride_id='.$pending_reserverd_kilo_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            @if($pending_reserverd_kilo_ride->driverriderequest->airline)
                                                <p><span class="fw-bold">Travel Company</span>
                                                    :- {{ $pending_reserverd_kilo_ride->driverriderequest->airline }}</p>
                                            @endif
                                            @if($pending_reserverd_kilo_ride->driverriderequest->maritimes)
                                                <p><span class="fw-bold">Travel Company</span>
                                                    :- {{ $pending_reserverd_kilo_ride->driverriderequest->maritimes }}</p>
                                            @endif
                                            <p> <span class="fw-bold">Number of Kilos Reserved</span> :- {{ $pending_reserverd_kilo_ride->reserved_kilo }}</p>
                                            <p> <span class="fw-bold">Departure Date</span> :- {{ $pending_reserverd_kilo_ride->driverriderequest->departure_datetime }}</p>
                                            <p> <span class="fw-bold">Arrival Date</span> :- {{ $pending_reserverd_kilo_ride->driverriderequest->arrival_datetime }}</p>
                                            <p> <span class="fw-bold">Expiry Date</span> :- {{ $pending_reserverd_kilo_ride->driverriderequest->end_reservation_date }}</p>
                                            <p> <span class="fw-bold">method of reception</span> :- {{ $pending_reserverd_kilo_ride->driverriderequest->package_receiving_method }}</p>
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $pending_reserverd_kilo_ride->driverriderequest->pickup_location }}</h5>
                                                </div>
                                            </li>
                                            @foreach($pending_reserverd_kilo_ride->driverriderequest->destination_location as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @if($pending_reserverd_kilo_ride->message == 'Package Awaiting Collection')
                                        <a href="{{ url('user/request-package-collected/'. $pending_reserverd_kilo_ride->id) }}" class="btn btn-warning w-100 auth-btn mt-3">Request the Package Collected</a>
                                    @endif
                                    <a href="#reasons" data-bs-toggle="offcanvas" data-id="{{ $pending_reserverd_kilo_ride->id }}" class="btn btn-danger w-100 mt-3 cancel_rideBtn">Cancel the Transport</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="pending-offers-tab">
                    <ul class="my-ride-list">
                        @foreach($pending_offers as $pending_offer)
                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="#" class="my-ride-img">
                                            <img class="img-fluid my-ride-icon" src="{{asset('assets/images/svg/car-img.svg')}}"
                                                 alt="receipt">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="#">
                                                    <h5 class="title-color fw-medium">{{ $pending_offer->user->name }}</h5>
                                                </a>
                                                <span class="badge badge-success text-white">{{ $pending_offer->created_at }}</span>
                                                <div class="flex-align-center">
                                                    <h5 class="fw-mediun theme-color price ps-2 pe-0">{{ $pending_offer->fare_currency }} {{ $pending_offer->fare }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div class="flex-align-center gap-1">
                                                <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                     alt="location">
                                                <h6 class="fw-normal title-color">{{ $pending_offer->distance }} km</h6>
                                            </div>
                                            <div>
                                                <span class="fw-bold">{{ $pending_offer->transport_title }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <p>Expiry Date :- {{ $pending_offer->expiry }}</p>
                                        </div>
                                        <div class="flex-align-center gap-2">
                                            <ul class="ride-location-listing mt-3">
                                            <li class="location-box">
                                                <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                     alt="location">
                                                <h5 class="fw-light title-color">{{ $pending_offer->pickup_location }}</h5>
                                            </li>

                                            @php
                                                $locations = json_decode($pending_offer->destination_location, true); // returns array
                                            @endphp
                                            @foreach($locations as $location)
                                                <li class="location-box">
                                                    <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                    <h5 class="fw-light title-color border-0">{{ $location }}
                                                    </h5>
                                                </li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    </div>
                                    <a href="{{url('user/get-pending-driver-fare-request?userriderequest_id='.$pending_offer->id)}}" class="btn theme-btn w-100 mt-3">View Carriers Requests</a>
                                    <a href="#offers" data-bs-toggle="offcanvas" data-id="{{ $pending_offer->id }}" class="btn btn-warning w-100 mt-3 cancel_offerBtn">Cancel the Offer</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="expired-offers-tab">
                    <ul class="my-ride-list" style="border: 1px solid gray; border-radius: 8px;">
                        @foreach($expired_offers as $expired_offer)
                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="#" class="my-ride-img">
                                            <img class="img-fluid my-ride-icon" src="{{asset('assets/images/svg/car-img.svg')}}"
                                                 alt="receipt">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="#">
                                                    <h5 class="title-color fw-medium">{{ $expired_offer->user->name }}</h5>
                                                </a>
                                                <span class="badge badge-success text-white">{{ $expired_offer->created_at }}</span>
                                                <div class="flex-align-center">
                                                    <h5 class="fw-mediun theme-color price ps-2 pe-0">{{ $expired_offer->fare_currency }} {{ $expired_offer->fare }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div class="flex-align-center gap-1">
                                                <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                     alt="location">
                                                <h6 class="fw-normal title-color">{{ $expired_offer->distance }} km</h6>
                                            </div>
                                            <div>
                                                <span class="fw-bold">{{ $expired_offer->transport_title }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <p>Expiry Date :- {{ $expired_offer->expiry }}</p>
                                        </div>
                                        <div class="flex-align-center gap-2">
                                            <ul class="ride-location-listing mt-3">
                                                <li class="location-box">
                                                    <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $expired_offer->pickup_location }}</h5>
                                                </li>

                                                @php
                                                    $locations = json_decode($expired_offer->destination_location, true); // returns array
                                                @endphp
                                                @foreach($locations as $location)
                                                    <li class="location-box">
                                                        <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color border-0">{{ $location }}
                                                        </h5>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="complete-tab">
                    <ul class="my-ride-list" style="border: 1px solid blue; border-radius: 8px;">
                        @foreach($completed_rides as $completed_ride)
                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="#" class="my-ride-img">
                                            <img class="img-fluid profile-img" src="{{ $completed_ride->driver->profile ? asset('storage/'.$completed_ride->user->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="#">
                                                    <h6 class="title-color fw-medium">{{ $completed_ride->driver->name }}</h6>
                                                </a>
                                                <span class="badge badge-success text-white">{{ $completed_ride->created_at }}</span>
                                                <h5 class="fw-mediun success-color">{{ $completed_ride->fare_currency}} {{ $completed_ride->fare }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div>
                                                <h6 class="fw-normal title-color">{{ $completed_ride->date_and_time_of_followup }}</h6>
                                                <h6 class="fw-normal title-color">{{ $completed_ride->distance }} km</h6>
                                            </div>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                                </a>
                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="tel:{{ $completed_ride->driver->phone }}">📞 Call Carrier</a></li>
                                                        <li><a class="dropdown-item" href="tel:{{ $completed_ride->receiver_phone }}">📞 Call Receiver</a></li>
                                                    </ul>
                                                </div>
                                                <a href="{{url('user/ride-details?ride_id='.$completed_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <p class="fw-bold">{{ $completed_ride->transport_title }}</p>
{{--                                            <p>Expiry Date :- {{ $completed_ride->expiry }}</p>--}}
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
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
                                                        <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
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
                            @foreach($reserved_kilo_completed_rides as $reserved_kilo_completed_ride)
                                <li>
                                    <div class="my-ride-box">
                                        <div class="my-ride-head d-flex align-items-center w-100" style="min-width: 0;">
                                            <!-- Profile Image -->
                                            <a href="#" class="my-ride-img flex-shrink-0">
                                                <img class="img-fluid profile-img"
                                                     style="border-radius: 100%; width:40px; height:40px; object-fit:cover;"
                                                     src="{{ $reserved_kilo_completed_ride->driver->profile ? asset('storage/'.$reserved_kilo_completed_ride->driver->profile) : asset('assets/images/profile/p5.png')}}"
                                                     alt="p5">
                                            </a>

                                            <!-- Ride Content -->
                                            <div class="d-flex align-items-center flex-grow-1 ms-2" style="min-width: 0;">
                                                <!-- Driver Name -->
                                                <h6 class="title-color fw-medium mb-0 me-2 flex-shrink-0">
                                                    {{ $reserved_kilo_completed_ride->driver->name }}
                                                </h6>

                                                <!-- Badge (can grow in height if text is long) -->
                                                <span class="badge badge-success text-white me-2 flex-grow-1 text-center"
                                                      style="white-space: normal;">
                                                I Travel - I Offer My Kilos Of Luggage For Sale
                                            </span>

                                                <!-- Price (sticks to the right, vertically centered) -->
                                                <h5 class="fw-medium success-color mb-0 flex-shrink-0 ms-2">
                                                    {{ $reserved_kilo_completed_ride->driverriderequest->price_currency }}{{ $reserved_kilo_completed_ride->totale_fare }}
                                                </h5>
                                            </div>
                                        </div>

                                        <div class="my-ride-details">
                                            <div class="ride-info">
                                                <div>
                                                    <h6 class="fw-normal title-color">{{ \Carbon\Carbon::parse($reserved_kilo_completed_ride->date_and_time_of_followup)->format('Y d M H:i:s') }}</h6>
                                                    <h6 class="fw-normal title-color">{{ $reserved_kilo_completed_ride->driverriderequest->distance }} km</h6>
                                                </div>
                                                <div class="flex-align-center gap-2">
                                                    <a href="{{url('driver/chatting')}}">
                                                        <img class="img-fluid communication-icon"
                                                             src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                                    </a>
                                                    <div class="dropdown">
                                                        <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="tel:{{ $reserved_kilo_completed_ride->driver->phone }}">📞 Call Carrier</a></li>
                                                            <li><a class="dropdown-item" href="tel:{{ $reserved_kilo_completed_ride->userfarerequest->receiver_phone }}">📞 Call Receiver</a></li>
                                                        </ul>
                                                    </div>
                                                    <a href="{{url('user/reserved-kilo-ride-details?ride_id='.$reserved_kilo_completed_ride->id)}}">
                                                        <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                @if($reserved_kilo_completed_ride->driverriderequest->airline)
                                                    <p><span class="fw-bold">Travel Company</span>
                                                        :- {{ $reserved_kilo_completed_ride->driverriderequest->airline }}</p>
                                                @endif
                                                @if($reserved_kilo_completed_ride->driverriderequest->maritimes)
                                                    <p><span class="fw-bold">Travel Company</span>
                                                        :- {{ $reserved_kilo_completed_ride->driverriderequest->maritimes }}</p>
                                                @endif
                                                <p> <span class="fw-bold">Number of Kilos Reserved</span> :- {{ $reserved_kilo_completed_ride->reserved_kilo }}</p>
                                                <p> <span class="fw-bold">Departure Date</span> :- {{ $reserved_kilo_completed_ride->driverriderequest->departure_datetime }}</p>
                                                <p> <span class="fw-bold">Arrival Date</span> :- {{ $reserved_kilo_completed_ride->driverriderequest->arrival_datetime }}</p>
                                                <p> <span class="fw-bold">Expiry Date</span> :- {{ $reserved_kilo_completed_ride->driverriderequest->end_reservation_date }}</p>
                                                <p> <span class="fw-bold">method of reception</span> :- {{ $reserved_kilo_completed_ride->driverriderequest->package_receiving_method }}</p>
                                            </div>
                                            <ul class="ride-location-listing">
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                             alt="location">
                                                        <h5 class="fw-light title-color">{{ $reserved_kilo_completed_ride->driverriderequest->pickup_location }}</h5>
                                                    </div>
                                                </li>
                                                @foreach($reserved_kilo_completed_ride->driverriderequest->destination_location as $location)
                                                    <li class="border-0 shadow-none">
                                                        <div class="location-box">
                                                            <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
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
                    <ul class="my-ride-list" style="border: 1px solid red; border-radius: 8px;">
                        @foreach($cancelled_rides as $cancelled_ride)
                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="#" class="my-ride-img">
                                            <img class="img-fluid profile-img" src="{{ $cancelled_ride->driver->profile ? asset('storage/'.$cancelled_ride->driver->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="#">
                                                    <h6 class="title-color fw-medium">{{ $cancelled_ride->driver->name }}</h6>
                                                </a>
                                                <span class="badge badge-success text-white">{{ $cancelled_ride->created_at }}</span>
                                                <h5 class="fw-mediun success-color">{{ $cancelled_ride->fare_currency}} {{ $cancelled_ride->fare }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div>
                                                <h6 class="fw-normal title-color">{{ $cancelled_ride->date_and_time_of_followup }}</h6>
                                                <h6 class="fw-normal title-color">{{ $cancelled_ride->distance }} km</h6>
                                            </div>                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                                </a>
                                                <div class="dropdown">
                                                    <a class="btn btn-light p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img class="img-fluid communication-icon" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="contact">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="tel:{{ $cancelled_ride->driver->phone }}">📞 Call Carrier</a></li>
                                                        <li><a class="dropdown-item" href="tel:{{ $cancelled_ride->receiver_phone }}">📞 Call Receiver</a></li>
                                                    </ul>
                                                </div>
                                                <a href="{{url('user/ride-details?ride_id='.$cancelled_ride->id)}}">
                                                    <img src="{{ asset('public/assets/images/view-detail-image.png') }}" title="View package details" width="30px" alt="loading">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <p class="fw-bold">{{ $cancelled_ride->transport_title }}</p>
{{--                                            <p>Expiry Date :- {{ $cancelled_ride->expiry }}</p>--}}
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
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
                                                        <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
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

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

        $(document).ready(function (){

            $('.cancel_rideBtn').click(function (){
                $('.offer_id').val($(this).data('id'));
            })

            $('.cancel_offerBtn').click(function (){
                $('.offer_id').val($(this).data('id'));
            })

        });

    </script>

@endsection
