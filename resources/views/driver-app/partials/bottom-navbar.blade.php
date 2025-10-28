@php use App\Models\Ridesbooked;use Illuminate\Support\Carbon;use Illuminate\Support\Facades\Auth; @endphp
<div class="navbar-menu">
    <ul>
        <li class="{{ request()->url() == url('/driver/home') ? 'active' : '' }}">
            <a href="{{url('driver/home')}}">
                <div class="icon">
                    <img class="unactive" src="{{asset('assets/images/svg/home.svg')}}" alt="home">
                    <img class="active" src="{{asset('assets/images/svg/home-fill.svg')}}" alt="home">
                </div>
                <span>Home Page</span>
            </a>
        </li>

        <li class="{{ request()->url() == url('/driver/my-rides') ? 'active' : '' }}">
            <a href="{{url('driver/my-rides')}}">
                <div class="icon">
                    <img class="unactive" src="{{asset('assets/images/svg/car.svg')}}" alt="car">
                    <img class="active" src="{{asset('assets/images/svg/car-fill.svg')}}" alt="car">
                </div>
                <span>My Transport</span>
            </a>
        </li>

        <li class="{{ request()->url() == url('/driver/setting') ? 'active' : '' }}">
            <a href="{{url('driver/setting')}}">
                <div class="icon">
                    <img class="unactive" src="{{asset('assets/images/svg/setting.svg')}}" alt="setting">
                    <img class="active" src="{{asset('assets/images/svg/setting-fill.svg')}}" alt="setting">
                </div>
                <span>My Account</span>
            </a>
        </li>
    </ul>
</div>
