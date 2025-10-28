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
                <div class="flex-align-center gap-2">
                    <a href="home.blade.php">
                        <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                    </a>
                    <h3>Page Listing</h3>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- page listing start -->
    <section class="pt-0 section-b-space">
        <div class="custom-container">
            <div class="element-title">
                <h3>Onboarding & Authentication</h3>
            </div>

            <div class="element-menu">
                <ul class="navigation">
                    <li class="pages">
                        <a href="index.blade.php">Onboarding<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="login.blade.php">Login<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="login-with-number.blade.php">Login With Number<i class="iconsax"
                                                                                  data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="otp.blade.php">Otp<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="signup.blade.php">Sign Up <i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="forgot-password.blade.php">Forgot Password <i class="iconsax"
                                                                               data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="varification.blade.php">Verification<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="reset-password.blade.php">Reset Password<i class="iconsax"
                                                                            data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="location.blade.php">Select Location<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="add-new-location.blade.php">Add New Location<i class="iconsax"
                                                                                data-icon="chevron-right"></i></a>
                    </li>
                </ul>
            </div>

            <div class="element-title">
                <h3>Main Pages</h3>
            </div>
            <div class="element-menu">
                <ul class="navigation">
                    <li class="pages">
                        <a href="home.blade.php">Home Page<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="accept-ride-details.blade.php">Accept Ride Details<i class="iconsax"
                                                                                      data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="add-new-rider.blade.php">Add New Rider<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="category.blade.php">Category <i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="chatting.blade.php">Chatting <i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="choose-rider.blade.php">Choose Rider<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="date-time-schedule.blade.php"> Date Time Schedule<i class="iconsax"
                                                                                     data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="driver-details.blade.php">Driver Details<i class="iconsax"
                                                                            data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="driver-fare-request.blade.php">Driver Fare Request<i class="iconsax"
                                                                                      data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="driver-review.blade.php"> Driver Review<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="finding-driver.blade.php">Outstation Finding Driver<i class="iconsax"
                                                                                       data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="notification.blade.php">Notification <i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="outstation.blade.php"> Outstation<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>

                    <li class="pages">
                        <a href="payment-details.blade.php">Payment Details<i class="iconsax"
                                                                              data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="payment-method.blade.php"> Payment Method<i class="iconsax"
                                                                             data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="rental.blade.php">Rental<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="rental-selact-ride.blade.php">Rental Select Ride<i class="iconsax"
                                                                                    data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="rental-vehicle-details.blade.php">Rental Vehicle Details<i class="iconsax"
                                                                                            data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="selact-ride.blade.php">Select Ride<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="search-location.blade.php">Search Location<i class="iconsax"
                                                                              data-icon="chevron-right"></i></a>
                    </li>
                </ul>
            </div>

            <div class="element-title">
                <h3>My Ride Pages</h3>
            </div>

            <div class="element-menu">
                <ul class="navigation">
                    <li class="pages">
                        <a href="my-rides.blade.php">My Ride<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="pending-ride-details.blade.php">Pending Ride Details<i class="iconsax"
                                                                                        data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="complete-ride-details.blade.php">Complete Ride Details<i class="iconsax"
                                                                                          data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="cancel-ride-details.blade.php">Cancel Ride Details<i class="iconsax"
                                                                                      data-icon="chevron-right"></i></a>
                    </li>
                </ul>
            </div>

            <div class="element-title">
                <h3>Profile, Settings Pages</h3>
            </div>

            <div class="element-menu">
                <ul class="navigation">
                    <li class="pages">
                        <a href="setting.blade.php">Setting<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="profile-setting.blade.php">Profile Setting<i class="iconsax"
                                                                              data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="app-setting.blade.php">App Setting<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="bank-details.blade.php">Bank Details<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="saved-location.blade.php">Saved Location<i class="iconsax"
                                                                            data-icon="chevron-right"></i></a>
                    </li>
                    <li class="pages">
                        <a href="coupon.blade.php">Promo Code<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>

                    <li class="pages">
                        <a href="app-setting.blade.php">App Setting<i class="iconsax" data-icon="chevron-right"></i></a>
                    </li>

                </ul>
            </div>

            <div class="element-title">
                <h3>Other Pages</h3>
            </div>
            <div class="element-menu">
                <ul class="navigation">
                    <li class="pages">
                        <a href="empty-notification.blade.php">Empty Notification<i class="iconsax"
                                                                                    data-icon="chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page listing start -->

    @endsection

    @section('script')


@endsection
