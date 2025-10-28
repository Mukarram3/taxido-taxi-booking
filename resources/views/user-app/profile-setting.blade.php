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
                <a href="{{url('user/setting')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>Profile setting</h3>
            </div>
        </div>
    </header>
    <!-- header end -->
    @php
        $user = \Illuminate\Support\Facades\Auth::guard('user')->user();
    @endphp
    <!-- setting section starts -->
    <div class="setting-section profile-setting-section mt-0">
        <form class="theme-form" action="{{ route('user.update_profile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="custom-container">
                <div class="profile-section section-t-space">
                    <div class="profile-image">
                        <img id="output" class="img-fluid profile-pic" src="{{ $user->profile ? asset('storage/'.$user->profile) : asset('assets/images/profile/p8.png') }}" alt="p8">
                        <input id="file" type="file" name="profile" onchange="loadFile(event)">
                        <i class="iconsax upload-icon" data-icon="edit-2"> </i>
                    </div>
                </div>
                    <div class="form-group mt-0">
                        <label class="form-label mb-2" for="Inputname">User Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="Inputname" placeholder="Enter your name">
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputnumner">Mobile Number</label>
                        <input type="number" class="form-control" id="Inputnumner" name="phone" value="{{ $user->phone }}" placeholder="Enter your number">
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputemail">Email</label>
                        <input type="email" class="form-control" id="Inputemail" name="email" value="{{ $user->email }}" placeholder="Enter your email">
                    </div>
            </div>
            <div class="fixed-btn">
                <div class="custom-container">
                    <button type="submit" class="btn theme-btn w-100 auth-btn">Update</button>
                </div>
            </div>
        </form>
    </div>
    <!-- setting section starts -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    @section('script')

        <!-- image-change js -->
        <script src="{{asset('assets/js/image-change.js')}}"></script>

@endsection
