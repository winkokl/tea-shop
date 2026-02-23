@extends('frontend.layouts.app')

@section('title', __('Verify Your E-mail Address'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Please enter OTP Code to verify account')
                    </x-slot>

                    <x-slot name="body">
                        <x-forms.post :action="route('frontend.auth.chk_verify_otp')" class="d-inline">
                            <div class="form-group row">
                                <div class="col-md-10">
                                    <input id="otp_code" type="text" class="form-control" name="otp_code" required autofocus>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-small btn-primary" type="submit">@lang('Verify')</button>
                                </div>
                            </div>
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
