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
                <h3>Document Registration</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- document varify page starts -->
    <section class="section-b-space pt-0">
        <div class="custom-container">
            <ul class="auth-form mt-0  pt-4">
                <li class="form-group mt-0">
                    <h5 class="fw-medium title-color mb-2">Birth Certificate</h5>
                    <div id="output" class="upload-image">
                        <input id="file" class="form-control upload-file" type="file" id="formFileLg">
                        <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                        <h5>Upload</h5>
                    </div>
                </li>
                <li class="form-group">
                    <h5 class="fw-medium title-color mb-2">Certificate of Registration</h5>
                    <div id="output" class="upload-image">
                        <input id="file" class="form-control upload-file" type="file" id="formFileLg">
                        <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                        <h5>Upload</h5>
                    </div>
                </li>
                <li class="form-group">
                    <h5 class="fw-medium title-color mb-2">Driving License</h5>
                    <div id="output" class="upload-image">
                        <input id="file" class="form-control upload-file" type="file" id="formFileLg">
                        <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                        <h5>Upload</h5>
                    </div>
                </li>
                <li class="form-group">
                    <h5 class="fw-medium title-color mb-2">National ID any ID Proof</h5>
                    <div id="output" class="upload-image">
                        <input id="file" class="form-control upload-file" type="file" id="formFileLg">
                        <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                        <h5>Upload</h5>
                    </div>
                </li>
                <li class="form-group">
                    <h5 class="fw-medium title-color mb-2">Pan Card</h5>
                    <div id="output" class="upload-image">
                        <input id="file" class="form-control upload-file" type="file" id="formFileLg">
                        <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                        <h5>Upload</h5>
                    </div>
                </li>
            </ul>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('driver/setting')}}" class="btn theme-btn w-100">Update</a>
            </div>
        </div>
    </section>

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection
@section('script')

    <!-- image change js -->
    <script src="{{asset('assets/js/image-change.js')}}"></script>
@endsection