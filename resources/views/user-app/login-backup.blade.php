@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="auth-header">
        <div class="custom-container">
            <div class="header-panel  pb-0">
                <img class="img-fluid mx-auto logo user-logo" src="{{asset('assets/images/logo/user/user-logo.png ')}}"
                    alt="logo">
                <img class="img-fluid mx-auto logo-dark user-logo"
                    src="{{asset('assets/images/logo/user/user-logo-dark.png ')}}" alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- login page start -->
    <div class="auth-bg-image-box">
        <div class="auth-bg-image"></div>
        <div class="auth-content-bg auth-content-bg-bottom">
            <div class="custom-container white-background pb-2">
                <div class="auth-title mt-0">
                    <div class="loader-line"></div>
                    <h6>Hey, You have been missed !</h6>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="auth-form mt-0" method="post" action="{{route('user.login')}}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputemail">Email</label>
                        <div class="position-relative">
                            <input type="email" class="form-control" name="email" id="Inputemail" placeholder="Enter email">
                            <i class="iconsax icon" data-icon="mail"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputpassword">Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" name="password" id="Inputpassword" placeholder="Enter password">
                            <i class="iconsax icon" data-icon="lock-2"></i>
                        </div>
                        <div class="show-hide toggler">
                            <i class="iconsax eye-icon icon-eye" data-icon="eye"></i>
                            <i class="iconsax eye-icon icon-eye-splash" data-icon="eye-slash"></i>
                        </div>
                    </div>
                    <div class="flex-spacing">
                        <div class="form-group mt-0">
                            <div class="form-check">
                                <input class="form-check-input m-0" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label remember mb-0 fw-normal title-color"
                                    for="flexCheckDefault">
                                    Remember me</label>
                            </div>
                        </div>
                        <a class="forgot" href="{{url('user/forgot-password')}}">Forgot password?</a>
                    </div>

                    <div class="division">
                        <span>OR</span>
                    </div>

                    <div class="flex-align-center gap-3">
                        <a href="{{ url('user/auth/google') }}" class="btn theme-btn google-btn w-50 flex-center gap-2">
                            <img class="img-fluid google" src="{{asset('assets/images/svg/google.svg')}}" alt="google" /> with
                            Google</a>

                        <a href="https://www.apple.com/" class="btn theme-btn google-btn w-50 flex-center gap-2">
                            <img class="img-fluid google apple" src="{{asset('assets/images/svg/apple.svg')}}" alt="apple" />
                            with
                            Apple</a>
                    </div>

                    <a href="{{url('user/login-with-number')}}" class="btn theme-btn google-btn w-100 flex-center gap-2 mt-3">
                        <img class="img-fluid google" src="{{asset('assets/images/svg/mobile.svg')}}" alt="mobile" /> with
                        Number</a>

                    <button type="submit" class="btn theme-btn w-100 auth-btn mt-3">Login</button>
                    <h6 class="content-color fw-normal my-3 text-center"> New User ?
                        <a href="{{url('user/signup')}}" class="title-color fw-medium">Sign up</a>
                    </h6>
                </form>
            </div>
        </div>
    </div>
    <!-- login page end -->

    @endsection

    @section('script')

        <!-- password hide/show js -->
        <script src="{{asset('assets/js/password-show.js ')}}"></script>

@endsection
