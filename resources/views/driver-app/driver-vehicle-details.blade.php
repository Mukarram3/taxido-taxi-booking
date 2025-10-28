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
                <a href="{{url('driver/setting')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>Vehicle Registration Details</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- header starts -->
    <section class="pt-0">
        <div class="auth-content-bg">
            <div class="custom-container">
                <ul class="vehicle-types-list mt-0 pt-4">
                    <li>
                        <label class="btn vehicle-type-button" for="btn-check-2"> <img class="img-fluid vehicle-img"
                                src="{{asset('assets/images/svg/car-img2.svg')}}" alt="car">
                            Car
                        </label>
                    </li>
                </ul>

                <form class="auth-form">
                    <div class="form-group mt-0">
                        <label class="form-label mb-2" for="Inputname">Vehicle Name</label>
                        <div class="position-relative">
                            <input type="text" class="form-control white-background" id="Inputname" value="BMW"
                                placeholder="Enter vehicle name">
                            <i class="iconsax icon" data-icon="car"></i>
                        </div>
                    </div>
                    <div class="form-group ">

                        <label class="form-label mb-2" for="Inputdate">Registration Date</label>
                        <div class="position-relative">
                            <input type="date" class="form-control white-background text-start" id="Inputdate">
                            <i class="iconsax icon" data-icon="calendar-1"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="InputVehicle">Select Vehicle Type</label>
                        <div class="position-relative">
                            <input type="text" class="form-control white-background text-start" id="InputVehicle"
                                value="Four Wheeler" placeholder="Enter vehicle type">
                            <i class="iconsax icon" data-icon="car"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="InputColor">Vehicle Color</label>
                        <div class="position-relative">
                            <input type="text" class="form-control white-background" id="InputColor" value="White"
                                placeholder="Enter vehicle color">
                            <i class="iconsax icon" data-icon="color-filter"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputseats">Maximum Seats</label>
                        <div class="position-relative">
                            <input type="number" class="form-control white-background text-start" id="Inputseats"
                                value="4" placeholder="Enter maximum seats">
                            <i class="iconsax icon" data-icon="users"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="rules-section section-b-space">
        <div class="custom-container">
            <h3 class="fw-medium title-color mb-3">Select Your Rule</h3>
            <div class="form-check mb-2">
                <label class="form-check-label" for="Check1">
                    Max, 2 in the back
                </label>
                <input class="form-check-input" type="checkbox" value="" id="Check1" checked>
            </div>
            <div class="form-check mb-2">
                <label class="form-check-label" for="Check2">
                    Food is not allowed to be eaten in cars.
                </label>
                <input class="form-check-input" type="checkbox" value="" id="Check2">
            </div>
            <div class="form-check mb-2">
                <label class="form-check-label" for="Check3">
                    I apologize, but this is not a pet
                </label>
                <input class="form-check-input" type="checkbox" value="" id="Check3">
            </div>
            <div class="form-check mb-2">
                <label class="form-check-label" for="Check4">
                    Please, no smoking in the car
                </label>
                <input class="form-check-input" type="checkbox" value="" id="Check4">
            </div>
            <div class="form-check mb-0">
                <label class="form-check-label" for="Check5">
                    No alcohol closed/open
                </label>
                <input class="form-check-input" type="checkbox" value="" id="Check5">
            </div>
        </div>
    </section>
    <div class="fixed-btn">
        <div class="custom-container">
            <a href="{{url('driver/setting')}}" class="btn theme-btn w-100 mt-0 auth-btn">Update</a>
        </div>
    </div>

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection
@section('script')

    <!-- image change js -->
    <script src="{{asset('assets/js/image-change.js')}}"></script>
@endsection