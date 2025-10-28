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
                <a href="{{url('user/rental')}}">
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

        <h5>Vehicle Type</h5>
        <ul class="ride-tab">

            <li class="w-100">
                <input type="radio" class="btn-check" name="options-base1" id="btn-check-11" checked>
                <label class="btn selact-ride-box" for="btn-check-11">
                    <a href="{{url('user/rental-vehicle-details')}}">
                        <i class="iconsax icon" data-icon="info-circle"> </i>
                    </a>
                    <img class="img-fluid vehicle-img" src="{{asset('assets/images/svg/bike-img.svg')}}" alt="bike">
                    <span class="vehicle-name flex-spacing">
                        Bike
                        <span class="flex-align-center fw-normal content-color">
                            <img class="user-icon" src="{{asset('assets/images/svg/profile-fill.svg')}}" alt="profile">
                            2
                        </span>
                    </span>
                </label>
            </li>
            <li class="w-100">
                <input type="radio" class="btn-check" name="options-base1" id="btn-check-12" checked>
                <label class="btn selact-ride-box" for="btn-check-12">
                    <a href="{{url('user/rental-vehicle-details')}}">
                        <i class="iconsax icon" data-icon="info-circle"> </i>
                    </a>
                    <img class="img-fluid vehicle-img" src="{{asset('assets/images/svg/car-img.svg')}}" alt="bike">
                    <span class="vehicle-name flex-spacing">
                        Car
                        <span class="flex-align-center fw-normal content-color">
                            <img class="user-icon" src="{{asset('assets/images/svg/profile-fill.svg')}}" alt="profile">
                            5
                        </span>
                    </span>
                </label>
            </li>

            <li class="w-100">
                <input type="radio" class="btn-check" name="options-base1" id="btn-check-13" checked>
                <label class="btn selact-ride-box" for="btn-check-13">
                    <a href="{{url('user/rental-vehicle-details')}}">
                        <i class="iconsax icon" data-icon="info-circle"> </i>
                    </a>
                    <img class="img-fluid vehicle-img" src="{{asset('assets/images/svg/shared-img.svg')}}" alt="bike">
                    <span class="vehicle-name flex-spacing">
                        Luxury
                        <span class="flex-align-center fw-normal content-color">
                            <img class="user-icon" src="{{asset('assets/images/svg/profile-fill.svg')}}" alt="profile">
                            6
                        </span>
                    </span>
                </label>
            </li>
        </ul>

        <p class="price-content">Minimum price for this fare is <span class="fw-semibold">$80</span> per
            ride. you can bid your price below.
        </p>

        <form class="theme-form mx-20">
            <div class="form-group">
                <label class="form-label mb-2" for="Inputstreet1">Offer your fare</label>
                <input type="text" class="form-control" id="Inputstreet1" placeholder="Enter fare amount">
            </div>

            <h5 class="p-0 mt-3 mb-2 fw-medium title-color">Payment Method</h5>
            <div class="order-type">
                <div class="flex-spacing gap-3 w-100">
                    <div class="form-check form-check3">
                        <input class="form-check-input" type="radio" name="RadioDefault" id="fixed45" checked>
                        <label class="form-check-label box-background" for="fixed45">
                            <span class="check-box"></span>
                            <span class="name">Cash</span>
                        </label>
                    </div>

                    <div class="form-check form-check3">
                        <input class="form-check-input" type="radio" name="RadioDefault" id="fixed469">
                        <label class="form-check-label box-background" for="fixed469">
                            <span class="check-box"></span>
                            <span class="name">Online-Payment</span>
                        </label>
                    </div>
                </div>
            </div>
        </form>
        <div class="custom-container">
            <a href="payment-method.blade.php" class="btn theme-btn w-100 my-3 auth-btn">Book Ride</a>
        </div>
    </div>
    <!-- Select ride section end -->

    @section('script')

        <!-- map js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
        <script src="{{asset('assets/js/custom-map.js')}}"></script>

@endsection