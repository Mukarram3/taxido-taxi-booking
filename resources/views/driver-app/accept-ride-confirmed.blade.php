@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')


@endsection

@section('content')

    <!-- header starts -->
    <header id="header" class="main-header inner-page-header position-absolute bg-transparent">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('driver/accept-ride/'.$userriderequest->id)}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!--  ride details section starts-->
    <div class="location-map position-relative w-100 h-100" id="map"></div>

    <div class="ride-content-bg">
        <div class="profile-head mt-0">
            <img class="img-fluid profile-img"
                 src="{{ optional($userriderequest->user)->profile
            ? asset('storage/' . $userriderequest->user->profile)
            : asset('assets/images/profile/p4.png') }}"
                 alt="profile">
            <div class="profile-content">
                <div>
                    <div class="flex-align-center gap-1">
                        <h5>{{ $userriderequest->user->name }}</h5>
                    </div>

                    <div class="flex-align-center gap-1">
                        <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                        <h5 class="fw-normal title-color">4.8</h5>
                        <span class="content-color fw-normal">(127)</span>
                    </div>
                </div>

                <div class="flex-align-center gap-2">
                    <a href="{{url('driver/chatting')}}" class="comm-icon">
                        <img class="img-fluid icon-btn" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                    </a>
                    <a href="tel:+4733378901" class="comm-icon">
                        <img class="img-fluid icon-btn" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="call">
                    </a>
                </div>
            </div>
        </div>

        <ul class="ride-location-listing mt-3">
            <li class="border-0 shadow-none">
                <div class="location-box">
                    <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                    <h5 class="fw-light title-color">{{ $userriderequest->pickup_location }}</h5>
                </div>
            </li>
            @php
                $locations = json_decode($userriderequest->destination_location, true); // returns array
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

        <div class="amount-part">
            <div class="total flex-spacing">
                <h4 class="fw-medium title-color">Total Fare </h4>
                <span class="fw-medium theme-color">{{ $userriderequest->fare_currency }} {{ $userriderequest->fare }}</span>
            </div>
            <div class="location-part fare-amount">
                <div class="flex-align-center gap-2">
                    <i class="iconsax dollar-icon" data-icon="dollar-square"> </i>
                    <div>
                        <h5 class="fw-medium title-color">{{ $userriderequest->payment_method }}</h5>
                        <h6 class="fw-normal content-color">Pay when the ride end</h6>
                    </div>
                </div>
            </div>
        </div>
        <form></form>
        <a href="{{route('driver.ride_verification',['userriderequest_id' => $userriderequest->id])}}" class="btn theme-btn w-100 mt-3">Accept Fare on {{ $userriderequest->fare_currency }} {{ $userriderequest->fare }}</a>
    </div>

@endsection
@section('script')
    <!-- map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
    <script src="{{asset('assets/js/custom-map.js')}}"></script>

@endsection
