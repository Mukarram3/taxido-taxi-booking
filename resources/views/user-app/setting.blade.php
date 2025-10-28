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
                <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                    <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                </a>
                <h3>Setting</h3>
            </div>
        </div>
    </header>
    <!-- header end -->
    @php
        $user = \Illuminate\Support\Facades\Auth::guard('user')->user();
    @endphp
    <!-- profile section starts -->
    <section class="setting-section">
        <div class="custom-container">
            <div class="profile-section white-background rounded-2 p-3">
                <div class="flex-align-center gap-2">
                    <div class="profile-image m-0">
                        <img class="img-fluid profile-pic" src="{{ $user->profile ? asset('storage/'.$user->profile) : asset('assets/images/profile/p8.png') }}" alt="p8">
                    </div>
                    <div class="profile-content">
                        <h3 class="profile-name">{{ $user->name }}</h3>
                        <h6 class="fw-normal content-color mt-1">{{ $user->email }}</h6>
                    </div>
                </div>
                <div class="wallet-part">
                    <h6>My Wallet Balance</h6>
                    <h5>${{ $user->balance }} </h5>

                </div>
            </div>
        </div>

        <div class="custom-container">
            <h4 class="fw-medium theme-color text-capitalize mt-4 mb-2">General</h4>
            <div class="profile-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="{{url('user/profile-setting')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="user-1"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Profile settings</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="{{url('user/saved-location')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="location"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Saved location </h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="{{url('user/bank-details')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="bank"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Bank details</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="{{url('user/coupon')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="ticket-1"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Promo code list</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <h4 class="fw-medium theme-color text-capitalize mt-4 mb-2">App details</h4>
            <div class="profile-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="{{url('user/app-setting')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="password-check"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>App setting </h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="#share" class="setting-box" data-bs-toggle="modal">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="send-2"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Share app</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="{{url('user/chatting')}}" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="message-dots-notif"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Chat support</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <a href="{{url('driver/index')}}" class="driver-banner-part">
                <div class="driver-img">
                    <img class="img-fluid driver-icon" src="{{asset('assets/images/svg/driver-vector-img.svg')}}" alt="">
                </div>
                <div class="driver-content">
                    <h4 class="theme-color fw-medium">Become a driver</h4>
                    <i class="iconsax icon" data-icon="chevron-right"> </i>
                </div>
            </a>

            <h4 class="fw-medium error-color text-capitalize mt-4 mb-2">Alert zone</h4>
            <div class="profile-list alert-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="#delete" class="setting-box" data-bs-toggle="modal">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="user-2-remove"> </i>
                            </div>
                            <div class="setting-content">
                                <h5 class="error-color">Delete account</h5>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="#logout" class="setting-box" data-bs-toggle="modal">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="logout-2"> </i>
                            </div>
                            <div class="setting-content">
                                <h5 class="error-color">Logout</h5>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- profile section starts -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    @include('user-app.partials.bottom-navbar')
    <!-- bottom navbar end -->

    <!-- add modal starts -->
    <div class="modal fade add-modal" id="share" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <h3>Share App</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <ul class="media-list">
                        <li>
                            <a href="#" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/whatsapp.svg')}}"
                                        alt="whatsapp">
                                </div>
                                <h5>Whatsapp</h5>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/facebook.svg')}}"
                                        alt="facebook">
                                </div>
                                <h5>Facebook</h5>
                            </a>
                        </li>

                        <li>
                            <a href="https://slack.com/signin#/signin" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/instagram.svg')}}"
                                        alt="instagram">
                                </div>
                                <h5>Instagram</h5>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.instagram.com/accounts/login/" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/twitter.svg')}}" alt="twitter">
                                </div>
                                <h5>Twitter</h5>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/accounts/login/" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/gmail.svg')}}" alt="gmail">
                                </div>
                                <h5>Email</h5>
                            </a>
                        </li>
                        <li>
                            <a href="https://telegr.am/user_mgt/login" class="media-box">
                                <div class="media-image mx-auto">
                                    <img class="img-fluid icon" src="{{asset('assets/images/svg/telegram.svg')}}"
                                        alt="telegram">
                                </div>
                                <h5>Telegram</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- add modal end -->

    <!-- delete account modal starts -->
    <div class="modal delete-modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-fluid icon" src="assets/images/svg/alert.svg" alt="alert">
                    <h4>Delete Your Account</h4>
                    <p>You will lost your data By delete your account.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{url('user/setting')}}" class="btn gray-btn w-50 m-0" data-bs-dismiss="modal">No, Keep it</a>
                    <a href="login.blade.php" class="btn theme-btn w-50 m-0">Yes, Delete</a>
                </div>
            </div>
        </div>
    </div>
    <!-- delete account modal end -->

    <!-- logout modal starts -->
    <div class="modal delete-modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-fluid icon" src="{{asset('assets/images/svg/logout.svg')}}" alt="alert">
                    <h4>Come Back Soon</h4>
                    <p>Are you sure You want to Logout?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('user/setting') }}" class="btn gray-btn w-50 m-0" data-bs-dismiss="modal">Stay, logged in</a>
                    <a href="{{url('user/logout')}}" class="btn theme-btn w-50 m-0">Yes, Logout </a>
                </div>
            </div>
        </div>
    </div>
    <!-- logout modal end -->

    <!-- sidebar starts -->
    @include('user-app.partials.sidear')
    <!-- sidebar end -->

@endsection

@section('script')

@endsection
