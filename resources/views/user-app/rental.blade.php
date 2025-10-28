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
                <a href="{{url('user/home')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- Select ride section starts -->
    <div class="location-map position-relative w-100 h-100" id="map"></div>
    <div class="theme-content-bg">
        <h5>Choose a Package</h5>
        <ul class="package-list">
            <li>
                <input type="radio" class="btn-check" name="options-base" id="btn-check-1" checked>
                <label class="btn package-box" for="btn-check-1">
                    <span class="time">1 hr</span>
                    <span class="distance">10 km</span>
                </label>
            </li>
            <li>
                <input type="radio" class="btn-check" name="options-base" id="btn-check-2">
                <label class="btn package-box" for="btn-check-2">
                    <span class="time">2 hr</span>
                    <span class="distance">20 km</span>
                </label>
            </li>

            <li>
                <input type="radio" class="btn-check" name="options-base" id="btn-check-3">
                <label class="btn package-box" for="btn-check-3">
                    <span class="time">4 hr</span>
                    <span class="distance">40 km</span>
                </label>
            </li>
            <li>
                <input type="radio" class="btn-check" name="options-base" id="btn-check-4">
                <label class="btn package-box" for="btn-check-4">
                    <span class="time">6 hr</span>
                    <span class="distance">60 km</span>
                </label>
            </li>
            <li>
                <input type="radio" class="btn-check" name="options-base" id="btn-check-5">
                <label class="btn package-box" for="btn-check-5">
                    <span class="time">12 hr</span>
                    <span class="distance">150 km</span>
                </label>
            </li>
        </ul>

        <div class="notes-part rental-note">
            <h6>Multiple stops, top drivers, affordable fares and more ride rentals.</h6>
        </div>

        <div class="custom-container">
            <a href="{{url('user/rental-selact-ride')}}" class="btn theme-btn px-3 mb-3 w-100">Select Ride</a>
        </div>
    </div>

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@section('script')

    <!-- map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
    <script src="{{asset('assets/js/custom-map.js')}}"></script>

@endsection