@extends('user-app.layout')

@section('title')
        <title>Taxido - User App </title>
@endsection

@section('style')
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">
    <!-- aos css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/aos.css')}}">
@endsection

@section('content')
    <!-- onboarding section start -->
    <section class="onboarding-section section-b-space" id="onboardingBody">
        <div class="auth-form pt-0 mt-0 position-absolute w-100  bg-transparent flex-spacing px-20">
            <div class="form-group mt-0">
                <select class="form-select language-select">
                    <option selected>English</option>
                    <option value="1">Arabic</option>
                    <option value="2">French</option>
                    <option value="3">Spanish</option>
                </select>
            </div>
            <a href="login.blade.php" class="content-color fw-normal skip-btn">Skip</a>
        </div>

        <div class="swiper main-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="poster-image">
                        <img class="img-fluid image" src="{{asset('assets/images/onboarding/user1.png')}}" alt="img1">
                        <img class="img-fluid image-dark" src="{{asset('assets/images/onboarding/user1dark.png')}}" alt="img1">
                        <img class="img-fluid users" src="{{asset('assets/images/onboarding/users.svg')}}" alt="img1">

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="poster-image">
                        <img class="img-fluid image" src="{{asset('assets/images/onboarding/user2.png')}}" alt="img1">
                        <img class="img-fluid image-dark" src="{{asset('assets/images/onboarding/user2dark.png')}}" alt="img1">
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="poster-image">
                        <img class="img-fluid image" src="{{asset('assets/images/onboarding/user3.png')}}" alt="img1">
                        <img class="img-fluid image-dark" src="{{asset('assets/images/onboarding/user3dark.png')}}" alt="img1">
                    </div>
                </div>
            </div>
        </div>

        <div class="custom-container">
            <div class="position-relative">
                <div class="bottom-box">
                    <div class="reletive-slider">
                        <div class="swiper thumbnail-slider2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="poster-details">
                                        <h2>Choose your destination</h2>
                                        <p>Simply touch and pick to have all of your products and services delivered to
                                            your door.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="poster-details">
                                        <h2>Enjoy your trip</h2>
                                        <p>Select a service from the list that correlates with your needs and then move
                                            forward.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="poster-details">
                                        <h2>Check fare & book ride</h2>
                                        <p>Choose an appropriate time and day, then reserve your service by including an
                                            address.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{url('user/login')}}" class="onboarding-button">
                    <i class="iconsax" data-icon="chevron-right"></i>
                </a>


            </div>

        </div>
    </section>
    <!-- onboarding section start -->

    <!-- pwa install app popup start -->
    <div class="offcanvas offcanvas-bottom addtohome-popup theme-offcanvas show" tabindex="-1" id="offcanvas"
        aria-modal="true" role="dialog">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <div class="offcanvas-body small">
            <div class="app-info">
                <img src="{{asset('assets/images/logo/user/48.png')}}" class="img-fluid" alt="">
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
        <!-- aos js -->
        <script src="{{asset('assets/js/aos.js')}}"></script>
        <script src="{{asset('assets/js/custom-aos.js')}}"></script>

        <!-- swiper js -->
        <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/custom-swiper.js')}}"></script>

@endsection