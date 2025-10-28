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
                <h3>Bank Details</h3>
            </div>
        </div>
    </header>
    <!-- header end -->
    @php
        $user = \Illuminate\Support\Facades\Auth::guard('user')->user();
    @endphp
    <!-- bank details section starts -->
    <section class="section-b-space">
        <form class="theme-form mt-0 pt-2" action="{{ route('user.user_bank_details') }}" method="post">
            @csrf
            <div class="custom-container">
                    <div class="form-group mt-0">
                        <label class="form-label mb-2" for="Inputname">Bank Name</label>
                        <input type="text" class="form-control white-background" name="bank_name" value="{{ $user->bank_name }}" id="Inputname"
                            placeholder="Enter bank name">
                    </div>
                    <div class="form-group ">
                        <label class="form-label mb-2" for="Inputholder">Holder Name</label>
                        <input type="text" class="form-control white-background" name="holder_name" value="{{ $user->holder_name }}" id="Inputholder"
                            placeholder="Enter holder name">
                    </div>
                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputnumner">Account No.</label>
                        <input type="number" class="form-control white-background" name="account_number" value="{{ $user->account_number }}" id="Inputnumner"
                            placeholder="Enter your account no">
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputbranch">Branch Name</label>
                        <input type="text" class="form-control white-background" name="branch_name" value="{{ $user->branch_name }}" id="Inputbranch"
                            placeholder="Enter branch name">
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputcode">IFSC code</label>
                        <input type="text" class="form-control white-background" name="ifsc_code" value="{{ $user->ifsc_code }}" id="Inputcode"
                            placeholder="Enter ifsc code">
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputswift">Swift code</label>
                        <input type="text" class="form-control white-background" name="swift_code" value="{{ $user->swift_code }}" id="Inputswift"
                            placeholder="Enter swift code">
                    </div>
            </div>

            <div class="fixed-btn">
                <div class="custom-container">
                    <button type="submit" class="btn theme-btn w-100 auth-btn mt-0">Update</button>
                </div>
            </div>
        </form>
    </section>
    <!-- bank details section starts -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->


@endsection

@section('script')



@endsection
