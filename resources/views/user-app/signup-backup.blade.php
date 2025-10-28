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
            <div class="header-panel pb-0">
                <img class="img-fluid mx-auto logo user-logo" src="{{asset('assets/images/logo/user/user-logo.png')}}"
                    alt="logo">
                <img class="img-fluid mx-auto logo-dark user-logo"
                    src="{{asset('assets/images/logo/user/user-logo-dark.png')}}" alt="logo">
            </div>
    </header>
    <!-- header end -->

    <!-- signup page starts -->
    <div class="auth-bg-image-box">
        <div class="auth-bg-image"></div>
        <div class="auth-content-bg auth-content-bg-bottom">
            <div class="custom-container white-background pb-2">
                <div class="auth-title">
                    <div class="loader-line"></div>
                    <h2>Create your account</h2>
                    <h6>Explore your life by joining with Ride.</h6>
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

                <form class="auth-form" method="POST" action="{{route('user.verify_otp')}}">
                    @csrf
                    <div class="form-group mt-0">
                        <label class="form-label mb-2" for="Inputname">User Name</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" name="name" id="Inputname" placeholder="Enter your name">
                            <i class="iconsax icon" data-icon="user-2"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputnumner">Mobile Number</label>
                        <div class="position-relative">
                            <input type="number" class="form-control" name="phone" id="Inputnumner" placeholder="Enter your number">
                            <i class="iconsax icon" data-icon="phone"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputemail">Email</label>
                        <div class="position-relative">
                            <input type="email" class="form-control" name="email" id="Inputemail" placeholder="Enter your email">
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

{{--                    <div class="form-group">--}}
{{--                        <label class="form-label mb-2" for="Inputid">Referral ID</label>--}}
{{--                        <div class="position-relative">--}}
{{--                            <input type="email" class="form-control" id="Inputid" placeholder="Enter referral id">--}}
{{--                            <i class="iconsax icon" data-icon="profile-card"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <button type="submit" class="btn theme-btn w-100 auth-btn">Sign Up</button>
                    <h6 class="content-color fw-normal my-3 text-center"> Already have
                        an account ? <a href="{{url('user/login')}}" class="title-color fw-medium">Sign in</a> </h6>
                </form>
            </div>
        </div>
    </div>
    <!-- signup page end -->

    @endsection

    @section('script')

        <!-- password hide/show js -->
        <script src="{{asset('assets/js/password-show.js ')}}"></script>

@endsection
