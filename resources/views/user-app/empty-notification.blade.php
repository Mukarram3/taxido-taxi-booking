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
                    <a href="{{url('user/home')}}">
                        <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                    </a>
                    <h3>Notifications</h3>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- empty image section starts -->
    <section class="pt-0 section-b-space">
        <div class="empty-images">
            <img class="img-fluid empty-icon" src="{{asset('assets/images/empty-bell.svg')}}" alt="notification">
            <div class="custom-container">
                <div class="empty-page-content">
                    <h3>Nothing here !!</h3>
                    <p>Click the "Refresh" button down below to check again for something amazing.</p>
                </div>
            </div>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('user/notification')}}" class="btn theme-btn w-100">Refresh</a>
            </div>
        </div>
    </section>
    <!-- empty image section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    @endsection

    @section('script')

        <!-- map js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
        <script src="{{asset('assets/js/custom-map.js')}}"></script>

@endsection