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
                <h3>Bank Registration Details</h3>

            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- bank details section starts -->
    <section>
        <div class="auth-content-bg">
            <div class="custom-container">
                <form class="theme-form mt-0 pt-2">
                    <div class="form-group mt-0">
                        <label class="form-label mb-2" for="Inputname">Bank Name</label>
                        <input type="text" class="form-control white-background" id="Inputname" value="DBS Bank"
                            placeholder="Enter bank name">
                    </div>
                    <div class="form-group ">
                        <label class="form-label mb-2" for="Inputholder">Holder Name</label>
                        <input type="text" class="form-control white-background" id="Inputholder" value="Zain Dorwart"
                            placeholder="Enter holder name">
                    </div>
                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputnumner">Account No.</label>
                        <input type="number" class="form-control white-background" id="Inputnumner" value="125626358956"
                            placeholder="Enter your account no">
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputbranch">Branch Name</label>
                        <input type="text" class="form-control white-background" id="Inputbranch" value="Toronto"
                            placeholder="Enter branch name">
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputcode">IFSC Code</label>
                        <input type="email" class="form-control white-background" id="Inputcode" value="DBS0IN0831"
                            placeholder="Enter ifsc code">
                    </div>
                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputswift">Swift Code</label>
                        <input type="email" class="form-control white-background" id="Inputswift" value="DBS0IN0831"
                            placeholder="Enter swift code">
                    </div>
                </form>

                <div class="fixed-btn">
                    <div class="custom-container">
                        <a href="{{url('driver/setting')}}" class="btn theme-btn w-100 mt-0 auth-btn">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- bank details section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->


@endsection
@section('script')


@endsection