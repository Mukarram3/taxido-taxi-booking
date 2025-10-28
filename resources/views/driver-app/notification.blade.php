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
                <div class="flex-align-center gap-2">
                    <a href="{{url('driver/home')}}">
                        <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                    </a>
                    <h3>Notifications</h3>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- notification section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <ul class="notification-list">
{{--                <li>--}}
{{--                    <div class="notification-box">--}}
{{--                        <div class="notification-icon">--}}
{{--                            <i class="iconsax icon" data-icon="clock"> </i>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h5>Account Alert!</h5>--}}
{{--                            <p>This allow you to retrieve your account if you lose access.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="notification-box">--}}
{{--                        <div class="notification-icon">--}}
{{--                            <i class="iconsax icon" data-icon="discount-circle"> </i>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h5>Receive 20% discount for first ride</h5>--}}
{{--                            <p>You have booked plumber service today at 6:30pm.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="notification-box">--}}
{{--                        <div class="notification-icon">--}}
{{--                            <i class="iconsax icon" data-icon="driving"> </i>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h5>New year shopping with rider!</h5>--}}
{{--                            <p>You have booked plumber service today at 6:30pm.</p>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="notification-box">--}}
{{--                        <div class="notification-icon">--}}
{{--                            <i class="iconsax icon" data-icon="ticket-discount"></i>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h5>You have received 1 coupon</h5>--}}
{{--                            <p>You have booked plumber service today at 6:30pm.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
                <li>

                    @if(\Illuminate\Support\Facades\Auth::guard('driver')->user())

                        @php
                            $notifications = \Illuminate\Support\Facades\Auth::guard('driver')->user()->unreadNotifications;
                        @endphp

                        @forelse($notifications as $notification)

                            <div class="notification-box">
                                <div class="notification-icon">
                                    <i class="iconsax icon" data-icon="ticket-discount"></i>
                                </div>
                                <div>
                                    @if(isset($notification->data['message']))
                                        {{ $notification->data['message'] }}
                                    @else
                                    [{{ $notification->created_at }}] User {{ $notification->data['name'] }} ({{ $notification->data['email'] }}) has just booked a ride with you.
                                    @endif
                                    <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                                        Mark as read
                                    </a>
                                </div>
                            </div>

                            @if($loop->last)
                                <a href="#" id="mark-all">
                                    Mark all as read
                                </a>
                            @endif
                        @empty
                            There are no new notifications
                        @endforelse
                    @else
                        Please Login first!
                    @endif
                </li>
            </ul>
        </div>
    </section>
    <!-- notification section end -->

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @if(\Illuminate\Support\Facades\Auth::guard('driver')->user())
        <script>

            function sendMarkRequest(id = null) {
                return $.ajax("{{ route('driver.markNotification') }}", {
                    method: 'POST',
                    data: {
                        _token,
                        id
                    }
                });
            }

            $(function() {
                $('.mark-as-read').click(function() {
                    let request = sendMarkRequest($(this).data('id'));

                    request.done(() => {
                        $(this).parents('div.notification-box').remove();
                    });
                });

                $('#mark-all').click(function() {
                    let request = sendMarkRequest();

                    request.done(() => {
                        $('div.notification-box').remove();
                    })
                });
            });
        </script>
    @endif
@endsection
