@extends('frontend.layouts.app')

@section('title', __('Reset Password'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Reset Password')
                    </x-slot>

                    <x-slot name="body">
                        <x-forms.post :action="route('frontend.auth.password.post')">
                            <div class="form-group row">
                                <label for="email_or_mobile" class="col-md-4 col-form-label text-md-right">@lang('E-mail Address Or Mobile')</label>

                                <div class="col-md-6">
                                    <input type="text" name="email_or_mobile" id="email_or_mobile" class="form-control" value="" placeholder="{{ __('E-mail Address Or Mobile') }}" maxlength="255" required autofocus />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">@lang('Request New Password')</button>
                                </div>
                            </div><!--form-group-->
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
