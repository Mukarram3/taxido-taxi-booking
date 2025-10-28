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

        .badge-warning { background-color: #ffc107; color: #212529; }
        .badge-info    { background-color: #17a2b8; color: #fff; }
        .badge-success { background-color: #28a745; color: #fff; }
        .badge-secondary { background-color: #6c757d; color: #fff; }
        .badge-light   { background-color: #f8f9fa; color: #212529; }
        .badge-danger   { background-color: red; color: white; }
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
                <li>
                    <div class="my-ride-box">
                        <div class="my-ride-head">
                            <a href="{{route('driver.accept_ride',['id'=>$userriderequest->id])}}" class="my-ride-img">
                                <img class="img-fluid profile-img" src="{{ $userriderequest->user?->profile ? asset('storage/'.$userriderequest->user->profile) : asset('assets/images/profile/p5.png') }}" alt="p5">
                            </a>

                            <div class="my-ride-content flex-column">
                                <div class="flex-spacing">
                                    <a href="{{route('driver.accept_ride',['id'=>$userriderequest->id])}}">
                                        <h5 class="title-color fw-medium">{{ $userriderequest->user?->name }}</h5>
                                    </a>
                                    <span class="text-primary fw-bold p-2 bg-info" style="border-radius: 10px">Looking for a traveler to carry</span>
                                    <div class="flex-align-center">
{{--                                        <div class="flex-align-center gap-1 pe-2">--}}
{{--                                            <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">--}}
{{--                                            <h5 class="fw-normal title-color p-0">4.8</h5>--}}
{{--                                        </div>--}}
                                        <h5 class="fw-mediun theme-color price ps-2 pe-0">{{ $userriderequest->fare_currency }} {{ $userriderequest->fare }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-ride-details">

                            <div class="ride-info">
                                <div class="d-flex flex-column gap-1">
                                    @if($userriderequest->is_urgent == '1')
                                        <span class="badge badge-danger">Urgent</span>
                                    @endif
                                        @if($userriderequest->is_professional == '1')
                                            <span>
                                                <i class="fa-solid fa-user text-primary fs-4" style="font-size: 16px !important; color: green !important;" title="Professional"></i>
                                            Professional
                                            </span>
                                        @endif

                                        <div class="d-flex align-items-center gap-1">
                                            <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                                            <h6 class="fw-normal title-color mb-0">{{ $userriderequest->distance }} km</h6>
                                        </div>
                                </div>
                                <div>
                                    <span class="fw-bold">{{ $userriderequest->transport_title }}</span>
                                </div>
                                <div class="flex-align-center gap-2">
                                    <a href="{{url('driver/chatting')}}">
                                        <img class="img-fluid communication-icon"
                                             src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                    </a>
                                    <a href="tel:{{ $userriderequest->user->phone }}" class="{{ !auth()->check() || $userriderequest->user_id != auth()->id() ? 'd-none' : '' }} callBtn">
                                        <img class="img-fluid communication-icon"
                                             src="{{asset('assets/images/svg/call-fill.svg')}}" alt="call">
                                    </a>
                                </div>
                            </div>
                            @php
                                $means = json_decode($userriderequest->means_of_transport, true);
                                $destination_location = json_decode($userriderequest->destination_location, true);
                                            $meanNames = is_array($means)
                                                ? \App\Models\Mean_of_transport::whereIn('id', $means)->pluck('name')->toArray()
                                                : [];
                            @endphp
                            <div class="d-flex flex-column">
{{--                                <p>Type of Package :- {{ $userriderequest->packagetype->title }}</p>--}}
{{--                                <p>Sub Type of Package :- {{ $userriderequest->packagesubtype->title }}</p>--}}
{{--                                <p>Length of Package :- {{ $userriderequest->length_of_package }}</p>--}}
{{--                                <p>Width of Package :- {{ $userriderequest->width_of_package }}</p>--}}
{{--                                <p>Weight of Package :- {{ $userriderequest->weight_of_package }}</p>--}}
{{--                                <p>Quantity of Package :- {{ $userriderequest->quantity_of_package }}</p>--}}
{{--                                <p>Mean of Transports :- {{ is_array($means) ? implode(', ', $means) : '' }}</p>--}}
{{--                                <p>Mean of Transport :- {{ is_array($meanNames) ? implode(', ', $meanNames) : '' }}</p>--}}
{{--                                <p>Departure Date :- {{ $userriderequest->departure_date }}</p>--}}
                                <p>Expiry Date :- {{ $userriderequest->expiry }}</p>
                            </div>
{{--                            <div class="d-flex flex-row">--}}
{{--                                @php--}}
{{--                                $parcel_pictures = $userriderequest->parcel_pictures ? json_decode($userriderequest->parcel_pictures) : '';--}}
{{--                                @endphp--}}
{{--                                @if($parcel_pictures)--}}
{{--                                    @foreach($parcel_pictures as $parcel_picture)--}}
{{--                                        <img src="{{ asset('storage/'. $parcel_picture) }}" class="me-1" width="50" height="50" alt="loading">--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </div>--}}
                            <ul class="ride-location-listing">
                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                                        <h5 class="fw-light title-color">{{ $userriderequest->pickup_location }}</h5>
                                    </div>
                                </li>
                                @php
                                    $locations = json_decode($userriderequest->destination_location, true); // returns array
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
                        <a href="{{route('driver.accept_ride',['id'=>$userriderequest->id])}}" class="btn theme-btn w-100 auth-btn mt-3"> View details and negotiate</a>
{{--                        <form action="{{ route('driver.request_fare') }}" method="post">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="userriderequest_id" value="{{ $userriderequest->id }}">--}}
{{--                            <input type="hidden" name="driver_location_latitude" id="driver_location_latitude">--}}
{{--                            <input type="hidden" name="driver_location_longitude" id="driver_location_longitude">--}}
{{--                            <input type="hidden" value="{{ $userriderequest->fare }}" name="requested_fare">--}}
{{--                            <button type="submit" class="btn theme-btn w-100 mt-3">Send a transport
request ${{ $userriderequest->fare }}</button>--}}
{{--                        </form>--}}
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
                </li>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/js/all.min.js" integrity="sha512-gBYquPLlR76UWqCwD06/xwal4so02RjIR0oyG1TIhSGwmBTRrIkQbaPehPF8iwuY9jFikDHMGEelt0DtY7jtvQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        }, 2000);

        function getUserRideRequest() {
            $.ajax({
                url: `/user/get-user-ride-request`,
                data: filterData,
                method: 'GET',
                success: function(response) {

                    if (response && response.length) {

                        let html = '';
                        let transportMap = {!! json_encode($allMeans) !!}; // e.g. { "1": "Car", "7": "Bike" }
                        let driver_request;
                        @if(isset($driver_request))
                         driver_request = {!! json_encode($driver_request) !!}; // e.g. { "1": "Car", "7": "Bike" }
                        @else
                         driver_request = {}; // fallback empty object
                        @endif
                        response.forEach(ride => {

                            let loggedIn = @json(auth()->check());
                            let authId   = @json(auth()->id());
                            let requestUserId = ride.user_id;
                            let hiddenClass = (!loggedIn || requestUserId !== authId) ? 'd-none' : '';

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

                            let transportData = ride.means_of_transport; // e.g. '["1","7"]'
                            let destination_location = ride.destination_location; // e.g. '["1","7"]'
                            let transportArray = [];
                            let destination_locationArray = [];

                            try {
                                destination_locationArray = JSON.parse(destination_location);
                            } catch (e) {
                                console.error("Invalid JSON:", destination_location);
                            }
                            try {
                                transportArray = JSON.parse(transportData);
                            } catch (e) {
                                console.error("Invalid JSON:", transportData);
                            }
                            let transportNames = Array.isArray(transportArray)
                                ? transportArray.map(id => transportMap[id] ?? `Unknown (${id})`)
                                : [];
                            let displayText = transportNames.join(', ');

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
                                    <span class="text-primary fw-bold p-2 bg-info" style="border-radius: 10px">Looking for a traveler to carry</span>
                                        <div class="flex-align-center">
                                            <h5 class="fw-mediun theme-color price ps-2 pe-0">${ride.fare_currency} ${ride.fare}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="my-ride-details">
                                <div class="ride-info">
                                <div class="d-flex flex-column gap-1">
                                    ${ride.is_urgent == 1 ? '<span class="badge badge-danger">Urgent</span>' : ''}
                                    ${ride.is_professional == 1 ? `
                                    <span>
                                        <i class="fa-solid fa-user" style="font-size:16px; color:green;" title="Professional"></i>
                                        Professional
                                    </span>
                                    ` : ''}
                                        <div class="d-flex align-items-center gap-1">
                                            <img class="icon img-fluid" src="/assets/images/svg/location-fill.svg"
                                                 alt="location">
                                            <h6 class="fw-normal title-color">${ride.distance} km</h6>
                                        </div>
                                    </div>
                                    <div>
                                    <span class="fw-bold">${ride.transport_title}</span>
                                    </div>
                                    <div class="flex-align-center gap-2">
                                        <a href="{{url('driver/chatting')}}">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                        </a>
                                        <a href="tel: ${ride.user.phone}" class="${hiddenClass}">
                                            <img class="img-fluid communication-icon"
                                                 src="{{asset('assets/images/svg/call-fill.svg')}}" alt="call">
                                        </a>
                                    </div>
                                </div>

                                <div class="d-flex flex-column">
                                    <p>Expiry Date :- ${ ride.expiry }</p>
                                </div>

<!--                                <div class="d-flex flex-row mb-2">-->
<!--                                </div>-->

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
                            <a href="/driver/accept-ride/${ride.id}" class="btn theme-btn w-100 auth-btn mt-3"> View details and negotiate</a>
                            <button type="button" class="btn theme-btn w-100 auth-btn mt-3 accept-fare-btn"
                        data-userriderequest_id="${ride.id}"
                        data-requested_fare="${ride.fare}">
                        ${text}
                    </button>
                        </div>
                    </li>`;
                        });

                        $('#userRideList').html(html);
                    } else {
                        $('#userRideList').html('<p>No Ride requests available.</p>');
                    }
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

@endsection
