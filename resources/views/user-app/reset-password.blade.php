@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="auth-header pb-0">
        <div class="custom-container">
            <div class="header-panel pb-0">
                <a href="{{url('user/varification')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- forgot password page start -->
    <div class="auth-image">
        <img class="img-fluid auth-img" src="{{asset('assets/images/reset-password.svg')}}" alt="forgot-password">
    </div>
    <div class="auth-bg-image-box auth-bg-image-box-inner">
        <div class="auth-content-bg auth-content-bg-bottom mt-0">
            <div class="custom-container">
                <div class="auth-title mt-0">
                    <div class="loader-line"></div>
                    <h2>Reset Your Password</h2>
                    <h6>Create a secure and memorable new password.</h6>
                </div>

                <form class="auth-form mt-0" method="post" action="{{ route('user.update_password') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputpassword1">Password</label>
                        <div class="position-relative">
                            <input type="password" name="password" class="form-control" id="Inputpassword1"
                                placeholder="Enter password">
                            <i class="iconsax icon" data-icon="lock-2"></i>
                        </div>
                        <div class="show-hide toggler">
                            <i class="iconsax eye-icon icon-eye" data-icon="eye"></i>
                            <i class="iconsax eye-icon icon-eye-splash" data-icon="eye-slash"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputpassword2">Password</label>
                        <div class="position-relative">
                            <input type="password" name="confirm_password" class="form-control" id="Inputpassword2"
                                placeholder="Enter password">
                            <i class="iconsax icon" data-icon="lock-2"></i>
                        </div>
                        <div class="show-hide toggler">
                            <i class="iconsax eye-icon icon-eye" data-icon="eye"></i>
                            <i class="iconsax eye-icon icon-eye-splash" data-icon="eye-slash"></i>
                        </div>
                    </div>
                    <div class="fixed-btn">
                        <div class="custom-container">
                            <button type="submit" class="btn theme-btn w-100">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- forgot password page end -->

    @section('script')

        <!-- password hide/show js -->
        <script src="{{asset('assets/js/password-show.js')}}"></script>

@endsection
