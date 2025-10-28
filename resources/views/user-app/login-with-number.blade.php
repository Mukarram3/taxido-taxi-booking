@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header pt-4 pb-3 box-background">
        <div class="custom-container">
            <div class="header-panel pb-0">
                <img class="img-fluid mx-auto logo user-logo" src="{{asset('assets/images/logo/user/user-logo.png')}}"
                    alt="logo">
                <img class="img-fluid mx-auto logo-dark user-logo"
                    src="{{asset('assets/images/logo/user/user-logo-dark.png')}}" alt="logo">
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
                    <h2>Let’s you in</h2>
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

                <form class="auth-form" action="{{url('user/login-with-number')}}" method="post">
                    @csrf
                    <div class="flex-align-center gap-3">
                        <a href="{{ url('user/auth/google') }}" class="btn theme-btn google-btn w-50 flex-center gap-2">
                            <img class="img-fluid google" src="{{asset('assets/images/svg/google.svg')}}" alt="google" /> with
                            Google</a>

                        <a href="https://www.apple.com/" class="btn theme-btn google-btn w-50 flex-center gap-2">
                            <img class="img-fluid google" src="{{asset('assets/images/svg/apple.svg')}}" alt="apple" /> with
                            Apple</a>
                    </div>

                    <a href="{{url('user/login')}}" class="btn theme-btn google-btn w-100 flex-center gap-2 mt-3">
                        <img class="img-fluid google" src="{{asset('assets/images/svg/gmail.svg')}}" alt="gmail" /> with
                        Email</a>

                    <div class="division">
                        <span>OR</span>
                    </div>

                    <div class="form-group mt-0">
                        <label class="form-label" for="validationDefault01">Mobile Number</label>
                        <div class="d-flex gap-2">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle mt-0" href="#" data-bs-toggle="dropdown">
                                    +1-212
                                    <i class="iconsax dropdown-icon" data-icon="chevron-down"> </i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">+1-212</a></li>
                                    <li><a href="#" class="dropdown-item">+1-213</a></li>
                                    <li><a href="#" class="dropdown-item">+1-702</a></li>
                                    <li><a href="#" class="dropdown-item">+1-312</a></li>
                                    <li><a href="#" class="dropdown-item">+1-617</a></li>
                                </ul>
                            </div>
                            <div class="form-group position-relative mt-0 w-100">
                                <input type="number" name="phone" class="form-control" id="validationDefault01"
                                    placeholder="Enter your number" required>
                                <i class="iconsax icon" data-icon="phone"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn theme-btn w-100 auth-btn">Sign In</button>
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

@endsection
