@extends('user-app.layout')

@section('title')
        <title>Taxido - User App </title>

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
                <a href="{{url('user/search-location')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">Add New Rider</h3>


                <a href="{{url('user/add-new-rider')}}">
                    <img class="icon-btn add-icon p-1" src="{{asset('assets/images/svg/user-plus.svg')}}" alt="user">
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- contact list section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <ul class="contact-list pt-0">
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p1.png')}}" alt="p1">
                            <div>
                                <h5>(+701) 7859 6326</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>

                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p5.png')}}" alt="p1">
                            <div>
                                <h5>Aathryn Murphy</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>

                    </a>
                </li>

                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p11.png')}}" alt="p1">
                            <div>
                                <h5>Gabriella</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>

                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p9.png')}}" alt="p1">
                            <div>
                                <h5>Hawkins</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p8.png')}}" alt="p1">
                            <div>
                                <h5>Haylee</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>

                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p3.png')}}" alt="p1">
                            <div>
                                <h5>Kistin</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p19.png')}}" alt="p1">
                            <div>
                                <h5>Lilla</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p14.png')}}" alt="p1">
                            <div>
                                <h5>Lisa</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p7.png')}}" alt="p7">
                            <div>
                                <h5>Michael</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p2.png')}}" alt="p1">
                            <div>
                                <h5>Mary</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p18.png')}}" alt="p1">
                            <div>
                                <h5>Nikki</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>

                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p12.png')}}" alt="p1">
                            <div>
                                <h5>Nora</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p10.png')}}" alt="p1">
                            <div>
                                <h5>Nienow</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>

                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p13.png')}}" alt="p1">
                            <div>
                                <h5>Osborne</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>

                </li>


                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p17.png')}}" alt="p1">
                            <div>
                                <h5>Ruby</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>

                </li>

                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p20.png')}}" alt="p1">
                            <div>
                                <h5>Talia</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p4.png')}}" alt="p1">
                            <div>
                                <h5>Trunk</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p21.png')}}" alt="p1">
                            <div>
                                <h5>Victoria</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>

                </li>
                <li>
                    <a href="{{url('user/selact-ride')}}" class="contact-box">
                        <div class="contact-details"> <img class="img-fluid img"
                                src="{{asset('assets/images/profile/p22.png')}}" alt="p1">
                            <div>
                                <h5>Zola</h5>
                            </div>
                        </div>
                        <i class="iconsax" data-icon="chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- contact list section end -->

@endsection

@section('script')


@endsection