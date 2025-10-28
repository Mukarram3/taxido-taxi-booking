@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">

@endsection

@section('content')

    <!-- onboarding section start -->
    <section class="onboarding-section">
        <div class="swiper driver-main-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="poster-image">
                        <img class="img-fluid image" src="{{asset('assets/images/onboarding/driver1.png')}}" alt="img1">
                        <img class="img-fluid image-dark" src="{{asset('assets/images/onboarding/driver1dark.png')}}"
                            alt="img1">

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="poster-image">
                        <img class="img-fluid image" src="{{asset('assets/images/onboarding/driver2.png')}}" alt="img1">
                        <img class="img-fluid image-dark" src="{{asset('assets/images/onboarding/driver2dark.png')}}"
                            alt="img2">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="poster-image">
                        <img class="img-fluid image" src="{{asset('assets/images/onboarding/driver3.png')}}" alt="img1">
                        <img class="img-fluid image-dark" src="{{asset('assets/images/onboarding/driver3dark.png')}}"
                            alt="img3">
                        <img class="img-fluid drivers" src="{{asset('assets/images/onboarding/drivers.svg')}}" alt="drivers">
                    </div>
                </div>
            </div>
        </div>

        <div class="custom-container">
            <div class="bottom-box driver-bottom-box">
                <div class="reletive-slider">
                    <div class="swiper driver-thumbnail-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="poster-details">
                                    <h2>Choose your destination</h2>
                                    <p>Simply touch and pick to have all of your products and services delivered
                                        to your door.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="poster-details">
                                    <h2>Enjoy your trip</h2>
                                    <p>Select a service from the list that correlates with your needs and then
                                        move
                                        forward.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="poster-details">
                                    <h2>Check fare & book ride</h2>
                                    <p>Choose an appropriate time and day, then reserve your service by
                                        including an address.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-next driver-onboarding-button boarding-button-next">
                    <h5>Next</h5>
                    <i class="iconsax" data-icon="chevron-right"></i>
                </div>
            </div>
        </div>
    </section>
    <!-- onboarding section end -->

    <!-- pwa install app popup start -->
    <div class="offcanvas offcanvas-bottom addtohome-popup theme-offcanvas show" tabindex="-1" id="offcanvas"
        aria-modal="true" role="dialog">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <div class="offcanvas-body small">
            <div class="app-info">
                <img src="{{asset('assets/images/logo/driver/48.png')}}" class="img-fluid" alt="">
                <div class="content">
                    <h3>Taxido App</h3>
                    <a href="#">www.taxido-app.com</a>
                </div>
            </div>
            <a href="#!" class="btn theme-btn install-app btn-inline home-screen-btn m-0" id="installApp">Add to Home
                Screen</a>
        </div>
    </div>
    <!-- pwa install app popup start -->

@endsection
@section('script')
    <!-- homescreen-popup js -->
    <script src="{{asset('assets/js/homescreen-popup.js')}}"></script>

    <!-- swiper js -->
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-swiper.js')}}"></script>
@endsection