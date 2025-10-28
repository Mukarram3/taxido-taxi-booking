@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                    <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                </a>
                <h3>Active Ride</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- active ride starts -->
    <section>
        <div class="custom-container">
            <ul class="my-ride-list driver-ride-list mt-0">
                @foreach($active_rides as $active_ride)
                    <li>
                        <div class="my-ride-box">
                            <div class="my-ride-head">
                                <a href="{{url('driver/accept-ride-confirmed')}}" class="my-ride-img">
                                    <img class="img-fluid profile-img" src="{{ $active_ride->user->profile ? asset('storage/'.$active_ride->user->profile) : asset('assets/images/profile/p5.png')}}" alt="p5">
                                </a>

                                <div class="my-ride-content flex-column">
                                    <div class="flex-spacing">
                                        <a href="{{url('driver/accept-ride-confirmed')}}">
                                            <h6 class="title-color fw-medium">{{ $active_ride->user->name }}</h6>
                                        </a>
                                        <h5 class="fw-mediun success-color">{{ $active_ride->fare_currency}} {{ $active_ride->fare }}</h5>
                                    </div>
                                    <div class="flex-align-center gap-3">
                                        <div class="flex-align-center gap-1">
                                            <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                            <h5 class="fw-normal title-color">4.8</h5>
                                            <span class="content-color fw-normal">(127)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="my-ride-details">
                                <div class="ride-info">
                                    <h6 class="fw-normal content-color">{{ $active_ride->departure_date }}</h6>
                                    <div class="flex-align-center gap-2">
                                        <a href="{{url('driver/chatting')}}" class="comm-icon">
                                            <img class="img-fluid icon-btn" src="{{asset('assets/images/svg/messages-fill.svg')}}"
                                                 alt="messages">
                                        </a>
                                        <a href="tel:{{ $active_ride->user->phone }}" class="comm-icon">
                                            <img class="img-fluid icon-btn" src="{{asset('assets/images/svg/call-fill.svg')}}"
                                                 alt="call">
                                        </a>
                                    </div>
                                </div>
                                <ul class="ride-location-listing mt-3">
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
                            <a href="{{url('driver/ride-complete-request/'.$active_ride->id)}}" class="btn theme-btn w-100 mt-3">Complete Ride</a>

                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- active ride end -->

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

@endsection
