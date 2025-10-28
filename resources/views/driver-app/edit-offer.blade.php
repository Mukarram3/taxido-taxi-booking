@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')

@endsection

@section('content')
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('driver/offer')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>Edit Offer</h3>
            </div>
        </div>
    </header>

    <!-- edit offer section starts -->
    <section class=" section-b-space">
        <div class="auth-content-bg">
            <div class="custom-container">
                <form class="theme-form mt-0 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mt-0">
                                <label class="form-label fw-medium">Vehicle type</label>
                                <input type="text" class="form-control white-background" value="Mini sedan"
                                    placeholder="Enter vehicle type">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label class="form-label fw-medium">Discount</label>
                                <input type="text" class="form-control white-background" value="30%"
                                    placeholder="Enter vehicle type">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mt-3">
                                <label class="form-label fw-medium">Start date</label>
                                <input type="date" class="form-control white-background">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mt-3">
                                <label class="form-label fw-medium">End date</label>
                                <input type="date" class="form-control white-background">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label class="form-label fw-medium">Available seats</label>
                                <select class="form-select offer-select">
                                    <option disabled>Available seats</option>
                                    <option value="1">1 Person</option>
                                    <option value="2">2 Person</option>
                                    <option value="3">3 Person</option>
                                    <option selected value="4">4 Person</option>
                                    <option value="5">6 Person</option>

                                </select>
                            </div>
                        </div>

                        <h5 class="fw-medium title-color mt-3 mb-2">Available area and up to kilometers</h5>
                        <div class="col-8 ">

                            <div class="form-group mt-0">
                                <input type="text" class="form-control white-background" value="Velocity"
                                    placeholder="Enter area">
                            </div>
                        </div>
                        <div class="col-4 ">
                            <div class="form-group mt-0">
                                <select class="form-select offer-select">
                                    <option disabled>Kilometer</option>
                                    <option selected value="1">10</option>
                                    <option value="2">20</option>
                                    <option value="3">30</option>
                                    <option value="4">40</option>
                                    <option value="5">50</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="active-offer">
                    <div class="offer">
                        <div class="flex-spacing">
                            <h6 class="fw-normal title-color">Active Status</h6>
                            <div class="switch-btn">
                                <input type="checkbox" checked>
                            </div>
                        </div>

                        <p class="mt-2 content-color fw-normal">You can deactivate and activate this offer at anytime.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('driver/offer')}}" class="btn theme-btn w-100">Edit offer</a>
            </div>
        </div>
    </section>
    <!-- edit offer section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection
@section('script')

    <!-- image change js -->
    <script src="{{asset('assets/js/image-change.js')}}"></script>
@endsection