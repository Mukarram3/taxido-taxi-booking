@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('user/outstation')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">Finding Driver</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- finding driver list starts -->
    <section class="driver-request section-b-space">
        <div class="custom-container">
            <ul class="driver-list pt-0">
                <li>
                    <div class="driver-box outstation-driver-box">
                        <div class="profile-head">
                            <div class="flex-align-center gap-2">
                                <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p8.png')}}"
                                    alt="profile">
                                <h5>Range Rover</h5>
                            </div>
                            <h4 class="fw-medium success-color navbar-expand">$100</h4>
                        </div>

                        <div class="flex-spacing flex-wrap gap-1 mt-2">
                            <h5 class="fw-normal title-color">Jonathan Higgins</h5>
                            <div class="d-flex align-items-start gap-1">
                                <img class="clock" src="{{asset('assets/images/svg/clock-circle.svg')}}" alt="clock">
                                <h6 class="fw-normal lh-base content-color">16 March 2024, 09:00AM</h6>
                            </div>
                        </div>

                        <div class="flex-spacing mt-2">
                            <div class="flex-align-center gap-1">
                                <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                <h5 class="fw-normal title-color">4.8</h5>
                                <span class="content-color fw-normal">(127)</span>
                            </div>
                        </div>

                        <div class="grid-btn mt-2">
                            <a href="#alert" data-bs-toggle="offcanvas" class="btn gray-btn w-100 m-0">Skip</a>
                            <a href="{{url('user/home')}}" class="btn theme-btn w-100 m-0">Accept</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="driver-box outstation-driver-box">
                        <div class="profile-head">
                            <div class="flex-align-center gap-2">
                                <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p4.png')}}"
                                    alt="profile">
                                <h5>Range Rover</h5>
                            </div>
                            <h4 class="fw-medium success-color">$80</h4>
                        </div>
                        <div class="flex-spacing flex-wrap gap-1 mt-2">
                            <h5 class="fw-normal title-color">Michael Tenner</h5>
                            <div class="d-flex align-items-start gap-1">
                                <img class="clock" src="{{asset('assets/images/svg/clock-circle.svg')}}" alt="clock">
                                <h6 class="fw-normal lh-base content-color">16 March 2024, 09:00AM</h6>
                            </div>
                        </div>
                        <div class="flex-spacing mt-2">
                            <div class="flex-align-center gap-1">
                                <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                <h5 class="fw-normal title-color">4.3</h5>
                                <span class="content-color fw-normal">(86)</span>
                            </div>
                        </div>

                        <div class="grid-btn mt-2">
                            <a href="#alert" data-bs-toggle="offcanvas" class="btn gray-btn w-100 m-0">Skip</a>
                            <a href="{{url('user/home')}}" class="btn theme-btn w-100 m-0">Accept</a>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="private-ride">
                <div class="ride-head">
                    <img class="car-img img-fluid" src="{{asset('assets/images/svg/shared-img.svg')}}" alt="shared">
                    <h6 class="title-color fw-normal">$400 for private ride</h6>
                </div>

                <div class="ride-content">
                    <h6 class="content-color fw-normal">28 Nov’23 | 9:00 AM</h6>
                    <h6 class="content-color fw-normal">Cash payment</h6>
                </div>

                <ul class="ride-location-listing box-background mt-3">
                    <li>
                        <div class="location-box">
                            <img class="icon box-background" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                alt="location">
                            <h5 class="fw-light title-color">17, Yonge St, Toronto, Canada</h5>
                        </div>
                    </li>

                    <li>
                        <div class="location-box">
                            <img class="icon box-background" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                            <h5 class="fw-light title-color border-0">20, Crystal St, Toronto, Canada</h5>
                        </div>
                    </li>
                </ul>
            </div>
            <a href="{{url('user/home')}}" class="btn theme-btn w-100 mt-4">CANCEL</a>
        </div>
    </section>
    <!-- finding driver list end -->

    <!-- alert offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="alert">
        <div class="offcanvas-body p-0">
            <div class="alert-part">
                <div class="title-content w-75 text-center mx-auto">
                    <h3 class="fw-medium justify-content-center">Are you sure you want to cancel ?</h3>
                </div>
                <div class="flex-align-center gap-3 mt-4">
                    <a href="driver-fare-request.blade.php" class="btn gray-btn w-100 m-0">No</a>
                    <a href="#reasons" data-bs-toggle="offcanvas" class="btn theme-btn w-100">Yes, Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <!-- alert offcanvas end -->

    <!-- reasons offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="reasons">
        <div class="offcanvas-body p-0">
            <div class="alert-part">
                <div class="title-content">
                    <h3 class="justify-content-center">Why do you want to cancel?</h3>
                </div>

                <ul class="reasons-list">
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed01">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/user-cross.svg')}}"
                                    alt="user-cross"> Driver asks for extra fare</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed01">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed02">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/user-speak.svg')}}"
                                    alt="user-speak"> Driver asked me to cancel</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed02">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed03">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/security-time.svg')}}"
                                    alt="security"> Driver asked to go directly</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed03">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed04">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/timer.svg')}}" alt="timer">
                                Wait time was too long</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed04">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed05">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/message-remove.svg')}}"
                                    alt="messages"> Driver doesn’t answer</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed05">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed06">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/driving-fill.svg')}}"
                                    alt="driving">Complaint about the rider</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed06">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed07">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/clock-circle.svg')}}"
                                    alt="clock">Driver getting closer</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed07">
                        </div>
                    </li>
                </ul>
                <div class="mt-5">
                    <a href="{{url('user/home')}}" class="btn theme-btn w-100 mt-0">Close</a>
                </div>
            </div>
        </div>
    </div>
    <!-- reasons offcanvas end -->

@endsection

@section('script')


@endsection
