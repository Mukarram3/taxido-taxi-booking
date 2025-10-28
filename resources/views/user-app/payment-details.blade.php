@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')

    <!-- header starts -->
    <header id="header" class="main-header inner-page-header position-absolute bg-transparent">
        <div class="custom-container">
            <div class="header-panel p-0">
                <a href="{{url('user/payment-method')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!--  ride details section starts-->
    <img class="img-fluid map-img" src="{{asset('assets/images/map.png')}}" alt="map">
    <div class="driver-info-box">
        <div>
            <h5 class="fw-medium">The driver’s on the way</h5>
            <h6 class="mt-1 fw-normal text-white text-opacity-75">Please don’t be late</h6>
        </div>
        <h3>6 min</h3>
    </div>

    <div class="ride-content-bg">
        <div class="details-title flex-spacing">
            <h4 class="fw-medium title-color">Your ride is confirmed</h4>
            <img class="img-fluid" src="{{asset('assets/images/svg/car-img.svg')}}" alt="car">
        </div>

        <div class="profile-head">
            <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p8.png')}}" alt="profile">
            <div class="profile-content">
                <div>
                    <div class="flex-align-center gap-1">
                        <h5>Jonathan Higgins</h5>
                        <a href="driver-details.blade.php">
                            <i class="iconsax icon" data-icon="info-circle"> </i>
                        </a>
                    </div>
                    <div class="flex-align-center gap-1">
                        <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                        <h5 class="fw-normal title-color">4.8</h5>
                        <span class="content-color fw-normal">(127)</span>
                    </div>
                </div>

                <div class="flex-align-center gap-2">
                    <a href="{{url('user/chatting')}}" class="comm-icon">
                        <img class="img-fluid icon-btn" src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                    </a>
                    <a href="tel:+4733378901" class="comm-icon">
                        <img class="img-fluid icon-btn" src="{{asset('assets/images/svg/call-fill.svg')}}" alt="car">
                    </a>
                </div>
            </div>
        </div>

        <div class="vehicle-info">
            <div>
                <div class="flex-align-center gap-1">
                    <h4 class="fw-medium title-color">CLMV069</h4>
                    <i class="iconsax icon" data-icon="car"> </i>
                </div>
                <h5 class="fw-normal content-color mt-1">Blue Tesla Diesel Taxi</h5>
            </div>
            <a href="driver-review.blade.php" class="flex-align-center gap-1">
                <img class="share-icon" src="{{asset('assets/images/svg/forward.svg')}}" alt="forward">
                <h6 class="fw-normal title-color">Share Trip</h6>
            </a>
        </div>

        <div class="amount-part">
            <div class="total flex-spacing">
                <h4 class="fw-medium title-color">Total Fare <span class="fw-semibold">$100</span></h4>
                <a href="{{url('user/home')}}" class="btn theme-btn p-2 d-inline-block m-0 pay-btn">Pay Now</a>
            </div>
            <div class="location-part fare-amount">
                <div class="flex-align-center gap-2">
                    <img class="img-fluid img" src="{{asset('assets/images/svg/google-pay.svg')}}" alt="google-pay">
                    <div>
                        <h5 class="fw-medium title-color">miketorello@okamerican</h5>
                        <h6 class="fw-normal content-color mt-1">Pay now to avoid cash payment</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')


@endsection