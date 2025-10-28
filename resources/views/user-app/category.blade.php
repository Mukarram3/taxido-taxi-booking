@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('content')
    <!-- header starts -->
    @include('user-app.partials.header')
    <!-- header end -->

    <!-- categories section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <ul class="main-categories-list">
                <li>
                    <a href="{{url('user/selact-ride')}}" class="main-categories-box ride">
                        <div class="main-categories-content">
                            <h5>Ride</h5>
                            <h6>Used for intercity traveling</h6>
                            <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/outstation')}}" class="main-categories-box outstation">
                        <div class="main-categories-content">
                            <h5>Outstation</h5>
                            <h6>Used for travel city to city</h6>
                            <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{url('user/rental')}}" class="main-categories-box rental">
                        <div class="main-categories-content">
                            <h5>Rental</h5>
                            <h6>Used for get <br> vehicle on rent</h6>
                            <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- categories section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    @include('user-app.partials.bottom-navbar')
    <!-- bottom navbar end -->

    <!-- sidebar starts -->
    @include('user-app.partials.sidear')
    <!-- sidebar end -->

@endsection

@section('script')


@endsection