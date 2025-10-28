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
                <a href="#" onclick="history.back();">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- location map start -->
    <div class="location-map mt-0 position-relative w-100 h-100" id="map"></div>
    <!-- location map end -->

    <!-- location popup start -->
    <div class="location-bg">
        <div class="ride-content-bg mt-0">
            <div class="location-title-content">
                <h5 class="fw-normal ">Select Service Location</h5>
                <a href="{{url('user/add-new-location')}}" class="change-location fw-medium theme-color">Change</a>
            </div>
            <div class="current-location-box">
                <div class="flex-align-center gap-2">
                    <div class="location-icon">
                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                    </div>

                    <h5 class="title-color fw-medium">Mesa street</h5>
                </div>
                <p>91, Wellington St., Ottawa, Ontario K1Y 2Z6, Canada.</p>
            </div>
            <a href="{{url('user/home')}}" class="btn theme-btn w-100 mt-3">Confirm Location</a>
        </div>
    </div>
    <!-- location popup end -->

@endsection

@section('script')

    <!-- map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
    <script src="{{asset('assets/js/custom-map.js')}}"></script>

@endsection