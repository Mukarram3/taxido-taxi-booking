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
    <header id="header" class="main-header inner-page-header position-absolute bg-transparent">
        <div class="custom-container">
            <div class="header-panel p-0">
                <a href="{{route('driver.home')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!--  ride details section starts-->
    <div class="location-map position-relative w-100 h-100" id="map"></div>
    <div class="ride-content-bg">
        <div class="details-title text-center border-0">
            <h4 class="fw-medium title-color">OTP Verified Successfully</h4>
        </div>
        <div class="successful-img text-center p-3 w-100">
            <img class="img-fluid success-img" src="{{asset('assets/images/otp-verify.svg')}}" alt="otp-verify">
        </div>
    </div>

@endsection
@section('script')
    <!-- map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
    <script src="{{asset('assets/js/custom-map.js')}}"></script>
@endsection
