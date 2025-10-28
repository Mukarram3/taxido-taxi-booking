@extends('user-app.layout')

@section('title')
        <title>Taxido - User App </title>
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
                <a href="{{url('user/rental-selact-ride')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">Driver Details</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- profile section starts -->
    <!-- <section>
        <div class="custom-container">
            <div class="profile-section">

                <div class="profile-image">
                    <img class="img-fluid profile-pic" src="assets/images/profile/p8.png" alt="p8">
                </div>
                <h3 class="profile-name">Jonathan Higgins</h3>
            </div>
        </div>
    </section> -->
    <!-- profile section end -->

    <!-- driver details section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="profile-setting-section driver-info-details-section">
                <div class="profile-section">
                    <div class="profile-image">
                        <img id="output" class="img-fluid profile-pic" src="{{asset('assets/images/profile/p8.png')}}"
                            alt="p8">
                        <i class="iconsax upload-icon" data-icon="edit-2"> </i>
                    </div>
                </div>
                <ul class="driver-info mt-3">
                    <li>
                        <div class="info-box">
                            <h2 class="theme-color fw-normal">215</h2>
                            <h6 class="mt-1 mt-sm-2 fw-normal content-color">Total Trips</h6>
                        </div>
                    </li>
                    <li>
                        <div class="info-box">
                            <h2 class="theme-color fw-normal">4.8/5</h2>
                            <h6 class="mt-1 mt-sm-2 fw-normal content-color">Rating</h6>
                        </div>
                    </li>
                    <li>
                        <div class="info-box">
                            <h2 class="theme-color fw-normal">2</h2>
                            <h6 class="mt-1 mt-sm-2 fw-normal content-color">Total Years</h6>
                        </div>
                    </li>
                </ul>

                <div class="car-info-box">
                    <div>
                        <h5>Tesla Diesel Car</h5>
                        <div class="flex-align-center gap-1 mt-3">
                            <h3 class="code">CLMV069</h3>
                            <i class="iconsax icon" data-icon="car"> </i>
                        </div>
                    </div>
                    <img class="img-fluid car-img" src="{{asset('assets/images/svg/shared-img.svg')}}" alt="car">
                </div>
            </div>
            <img class="img-fluid rental-car-img w-100" src="{{asset('assets/images/product/rental-car.jpg')}}"
                alt="rental-car">



            <div class="title mt-3">
                <h4>Reviews</h4>
            </div>

            <ul class="review-listing">
                <li class="w-100">
                    <div class="review-box">
                        <div class="profile-head">
                            <img class="profile-pic" src="{{asset('assets/images/profile/p3.png')}}" alt="p2">
                            <div class="profile-content">
                                <h5>Aenny Wilson</h5>
                                <div class="flex-align-center gap-1">
                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    <h6 class="fw-normal content-color">4.8</h6>
                                </div>
                            </div>
                        </div>
                        <p>“He has given the best riding experience to me”</p>
                    </div>
                </li>
                <li class="w-100">
                    <div class="review-box">
                        <div class="profile-head">
                            <img class="profile-pic" src="{{asset('assets/images/profile/p12.png')}}" alt="p2">
                            <div class="profile-content">
                                <h5>Laila Adams</h5>
                                <div class="flex-align-center gap-1">
                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    <h6 class="fw-normal content-color">4.4</h6>
                                </div>
                            </div>
                        </div>
                        <p>"He made my wonderful experience for me."</p>
                    </div>
                </li>
                <li class="w-100">
                    <div class="review-box">
                        <div class="profile-head">
                            <img class="profile-pic" src="{{asset('assets/images/profile/p11.png')}}" alt="p2">
                            <div class="profile-content">
                                <h5>Angela Carter</h5>
                                <div class="flex-align-center gap-1">
                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    <h6 class="fw-normal content-color">4.6</h6>
                                </div>
                            </div>
                        </div>
                        <p>“He has given the best riding experience to me”</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- driver details section end -->

@endsection

@section('script')

    <!-- swiper js -->
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-swiper.js')}}"></script>

@endsection