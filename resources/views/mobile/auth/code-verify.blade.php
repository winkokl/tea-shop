@extends('mobile.layouts.second-master')

@section('title', __('Tea'))


@section('content')
 <!-- Page Content -->
 <div class="page-content">
    <!-- Banner -->
    <div class="banner-wrapper mb-0 py-3">
        <div class="container inner-wrapper">
            <a href="{{route('frontend.index')}}" class="side-menu-logo">
                <img src="{{asset('mobile/assets/images/svg/tea-light-green-logo.png')}}" alt="/">
            </a>
        </div>
    </div>
    <!-- Banner End -->
    <div class="container">
        <div class="card dz-form-group">
            <div class="card-header">
                <h2 class="title">Enter Code</h2>
                <p class="mb-0"> @lang('Please enter Code from your phone to verify account')</p>
                @include('mobile.includes.partials.messages')
            </div>
            <div class="card-body">
                <x-forms.post :action="route('frontend.auth.verification.code.post')">
                    <div id="otp" class="digit-group">
                        <input class="form-control" type="text" id="digit-2" name="digit_2" placeholder="-" data-next="digit-3" data-previous="digit-1">
                        <input class="form-control" type="text" id="digit-3" name="digit_3" placeholder="-" data-next="digit-4" data-previous="digit-2">
                        <input class="form-control" type="text" id="digit-4" name="digit_4" placeholder="-" data-next="digit-5" data-previous="digit-3">
                        <input class="form-control" type="text" id="digit-5" name="digit_5" placeholder="-" data-next="digit-6" data-previous="digit-4">
                    </div>
                    {{-- <div class="d-flex align-items-center justify-content-center mb-3">
                        <a href="javascript:void(0);" class="text-light text-center d-block">Don’t you recevied any code?</a>
                        <a href="javascript:void(0);" class="btn-link d-block ms-2 text-underline">Resend</a>
                    </div> --}}
                    <div class="seprate-box">
                        {{-- <a href="{{route('frontend.auth.first.step.register')}}" class="back-btn">
                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.40366 8L9.91646 2.58333L7.83313 0.499999L0.333132 8L7.83313 15.5L9.91644 13.4167L4.40366 8Z" fill="white"></path>
                            </svg>
                        </a> --}}
                        {{-- <a href="{{route('frontend.mobile_change_password')}}" class="btn btn-primary btn-block">NEXT</a> --}}
                        <button class="btn btn-primary btn-block" type="submit">@lang('Verify')</button>
                    </div>
                </x-forms.post>
                <x-forms.post :action="route('frontend.auth.verification.code.resend')" class="d-inline">
                    <div class="d-flex align-items-center justify-content-center mt-3">
                        <a href="javascript:void(0);" class="text-light text-center d-block">Don’t you recevied any code?</a><br>
                        <button class="btn-link d-block ms-2 text-underline" type="submit" style="border:0px;background:#d2ecdd;">@lang('RESEND CODE')</button>
                    </div>
                </x-forms.post>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End -->
@endsection
