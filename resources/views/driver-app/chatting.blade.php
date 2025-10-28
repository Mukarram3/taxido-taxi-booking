@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <div class="flex-align-center gap-2">
                    <a href="{{url('driver/home')}}">
                        <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                    </a>
                    <div class="d-block">
                        <h5 class="fw-medium title-color">Templeton Peck</h5>
                        <h6 class="fw-medium success-color">Online</h6>
                    </div>
                </div>

                <div class="dropdown more-options dropdown-menu-end">
                    <a class="btn dropdown-toggle mt-0 p-0" href="#" data-bs-toggle="dropdown">
                        <i class="iconsax icon-btn" data-icon="menu-meatballs"> </i>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item"> Call Now</a> </li>
                        <li><a href="#" class="dropdown-item">Clear Chat</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- chatting section start -->
    <section class="msger pt-0 section-b-space">
        <div class="custom-container">
            <h6 class="fw-normal text-center content-color heading pb-3">Today 12:15 AM</h6>
            <div class="msger-chat">
                <div class="msg left-msg">
                    <div class="msg-img">
                        <img class="icon" src="{{asset('assets/images/profile/p5.png')}}" alt="profile" />
                    </div>

                    <div class="msg-bubble">
                        <div class="msg-text">Hi, welcome to taxido</div>
                    </div>
                </div>

                <div class="msg right-msg">
                    <div class="msg-img">
                        <img class="icon" src="{{asset('assets/images/profile/p2.png')}}" alt="profile" />
                    </div>

                    <div class="msg-bubble">
                        <div class="msg-text">Hi!</div>
                    </div>
                </div>
            </div>

            <form class="msger-inputarea">
                <input type="text" name="message" id="send_message" class="msger-input" placeholder="Enter your message..." />
                <img class="img-fluid smile" id="results" src="{{asset('assets/images/svg/smile.svg')}}" alt="">
                <i class="iconsax mic" data-icon="mic-2"> </i>

                <button type="submit" class="msger-send-btn">
                    <i class="iconsax icon-btn" data-icon="send-2"> </i>
                </button>
            </form>
        </div>
    </section>
    <!-- chatting section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->
@endsection
@section('script')
@endsection
    <script>
        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
    </script>
    <!-- chatting js -->
    <script src="{{asset('assets/js/chatting-chat.js')}}"></script>

@endsection
