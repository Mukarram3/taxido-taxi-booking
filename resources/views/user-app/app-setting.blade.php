@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('content')

    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('user/setting')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>App setting</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- profile section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="profile-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="#" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="bell-1"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Notification</h5>
                                <div class="switch-btn">
                                    <input type="checkbox" checked>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="w-100">
                        <a href="#currency" data-bs-toggle="modal" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="cash"> </i>
                            </div>
                            <div class="setting-content">
                                <div>
                                    <h5>Change Currency</h5>
                                    <h6>US Dollar</h6>
                                </div>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                    <li class="w-100">
                        <a href="#language" data-bs-toggle="modal" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="translate"> </i>
                            </div>
                            <div class="setting-content">
                                <div>
                                    <h5>Change Language</h5>
                                    <h6>English</h6>
                                </div> <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- profile section starts -->

    <!-- Change currency modal starts -->
    <div class="modal add-modal fade" id="currency" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <h3>Change Currency</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <ul class="option-listing">
                        <li class="w-100">
                            <div class="form-check mt-0 pb-3">
                                <label class="form-check-label" for="fixed01"><img class="flag"
                                        src="{{asset('assets/images/icons/flag8.svg')}}" alt=""> US dollar</label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed01"
                                    checked>
                            </div>
                        </li>

                        <li class="w-100">
                            <div class="form-check mt-3 pb-3">
                                <label class="form-check-label" for="fixed02"><img class="flag"
                                        src="{{asset('assets/images/icons/flag5.svg')}}" alt=""> INR</label>
                                <input class="form-check-input" type="radio" checked name="flexRadioDefault"
                                    id="fixed02">
                            </div>
                        </li>

                        <li class="w-100">
                            <div class="form-check mt-3 pb-3">
                                <label class="form-check-label" for="fixed03"><img class="flag"
                                        src="{{asset('assets/images/icons/flag3.svg')}}" alt=""> Euro</label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed03">
                            </div>
                        </li>

                        <li class="w-100">
                            <div class="form-check mt-3 pb-3 border-0">
                                <label class="form-check-label" for="fixed04"><img class="flag"
                                        src="{{asset('assets/images/icons/flag7.svg')}}" alt=""> Pound</label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed04">
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="modal-footer pt-0">
                    <a href="{{url('user/setting')}}" class="btn theme-btn w-100 mt-0">Update</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Change currency modal end -->

    <!-- Change language modal starts -->
    <div class="modal add-modal fade" id="language" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pb-0">
                    <h3>Change Language</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <ul class="option-listing">
                        <li class="w-100">
                            <div class="form-check mt-0 pb-3">
                                <label class="form-check-label" for="fixed1"><img class="flag"
                                        src="{{asset('assets/images/icons/flag2.svg')}}" alt="">English</label>
                                <input class="form-check-input" checked type="radio" name="flexRadioDefault" id="fixed1">
                            </div>
                        </li>
                        <li class="w-100">
                            <div class="form-check mt-3 pb-3">
                                <label class="form-check-label" for="fixed2"><img class="flag"
                                        src="{{asset('assets/images/icons/flag1.svg')}}" alt="">Arabic</label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed2">
                            </div>
                        </li>

                        <li class="w-100">
                            <div class="form-check mt-3 pb-3">
                                <label class="form-check-label" for="fixed3"><img class="flag"
                                        src="{{asset('assets/images/icons/flag4.svg')}}" alt=""> French</label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed3">
                            </div>
                        </li>

                        <li class="w-100">
                            <div class="form-check mt-3 pb-3 border-0">
                                <label class="form-check-label" for="fixed4"><img class="flag"
                                        src="{{asset('assets/images/icons/flag6.svg')}}" alt=""> Spanish</label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed4">
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="modal-footer pt-0">
                    <a href="{{url('user/setting')}}" class="btn theme-btn w-100 mt-0">Update</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Change language modal end -->

    @endsection

    @section('script')



@endsection