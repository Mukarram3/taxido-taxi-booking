<div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
    <div class="offcanvas-header sidebar-header">
        <div class="sidebar-logo">
            <img class="img-fluid logo" src="{{asset('assets/images/logo/user/user-logo.png')}}" alt="logo">
            <img class="img-fluid logo-dark" src="{{asset('assets/images/logo/user/user-logo-dark.png')}}" alt="logo">
        </div>
    </div>
    @php
        $user = \Illuminate\Support\Facades\Auth::guard('user')->user();
    @endphp
    <div class="offcanvas-body">
        <a href="{{url('user/profile-setting')}}" class="profile-part flex-align-center gap-2">
            <img class="img-fluid profile-pic" src="{{asset('assets/images/profile/p8.png')}}" alt="p8">
            <div>
                <h3>{{ $user->name }}</h3>
                <span>Edit Account</span>
            </div>
        </a>
        <ul class="link-section switch-section">
            <li class="active">
                <a href="{{url('user/home')}}" class="pages">
                    <i class="iconsax sidebar-icon" data-icon="home-2"> </i>
                    <h3>Home</h3>
                </a>
            </li>
            <li>
                <a href="{{url('user/my-rides')}}" class="pages">
                    <i class="iconsax sidebar-icon" data-icon="car"> </i>
                    <h3>My Ride</h3>
                </a>
            </li>
            <li>
                <a href="{{url('user/notification')}}" class="pages">
                    <i class="iconsax sidebar-icon" data-icon="bell-2"> </i>
                    <h3>Notification</h3>
                </a>
            </li>

            <li>
                <a href="{{url('user/setting')}}" class="pages">
                    <i class="iconsax sidebar-icon" data-icon="user-1"> </i>
                    <h3>Account</h3>
                </a>
            </li>
{{--            <li>--}}
{{--                <a href="{{url('user/page-listing')}}" class="pages">--}}
{{--                    <i class="iconsax sidebar-icon" data-icon="book-closed"> </i>--}}
{{--                    <h3>Template Pages</h3>--}}
{{--                </a>--}}
{{--            </li>--}}

            {{--<li>--}}
            {{--<a href="../elements/elements-page.html" class="pages">--}}
            {{--<i class="iconsax sidebar-icon" data-icon="document-text-1"> </i>--}}
            {{--<h3> Template Elements</h3>--}}
            {{--</a>--}}
            {{--</li>--}}


            <li>
                <div class="pages">
                    <i class="iconsax sidebar-icon" data-icon="repeat"> </i>
                    <h3>RTL</h3>
                </div>
                <div class="switch-btn">
                    <input id="dir-switch" type="checkbox">
                </div>
            </li>

            <li>
                <div class="pages">
                    <i class="iconsax sidebar-icon" data-icon="brush-3"> </i>
                    <h3>Dark</h3>
                </div>
                <div class="switch-btn">
                    <input id="dark-switch" type="checkbox">
                </div>
            </li>

        </ul>

        <div class="bottom-sidebar">
            <a href="{{url('user/logout')}}" class="pages">
                <i class="iconsax sidebar-icon" data-icon="logout-2"> </i>
                <h3>Logout</h3>
            </a>
        </div>
    </div>
</div>
