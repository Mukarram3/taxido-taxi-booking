<header id="header" class="main-header">
    <div class="custom-container">
        <div class="header-panel">
            <div class="flex-align-center gap-2">
                <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                    <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                </a>
                <img class="img-fluid logo user-logo" src="{{asset('assets/images/logo/user/user-logo-white.png')}}"
                     alt="logo">
            </div>

            <div class="flex-align-center gap-sm-3 gap-2">
                <a href="{{url('user/chatting')}}">
                    <i class="iconsax icon-btn" data-icon="messages-2"> </i>
                </a>
                @if(\Illuminate\Support\Facades\Auth::guard('user')->user())

                    @php
                        $notifications = \Illuminate\Support\Facades\Auth::guard('user')->user()->unreadNotifications;
                    @endphp
                    @if(count($notifications)>0)
                        <a href="{{url('user/notification')}}">

                            <i class="iconsax icon-btn noti-icon" data-icon="bell-2"> </i>
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</header>
