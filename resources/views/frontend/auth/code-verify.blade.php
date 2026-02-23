@extends('frontend.layouts.app')

@section('title', __('Verify Your E-mail Address'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Please enter Code from your email (or) phone to verify account')
                    </x-slot>

                    <x-slot name="body">
                        <x-forms.post :action="route('frontend.auth.verification.code.post')" class="d-inline">
                            <div class="form-group row">
                                <label for="code" class="col-form-label text-md-right col-md-4">@lang('Code')</label>
                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control" name="code" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    <button class="btn btn-small btn-primary" type="submit">@lang('Verify')</button>
                                </div>
                            </div>
                        </x-forms.post>
                        <x-forms.post :action="route('frontend.auth.verification.code.resend')" class="d-inline">
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    <button class="btn btn-link p-0 m-0 align-baseline text-center" type="submit">@lang('RESEND CODE').</button>
                                </div>
                                
                            </div>
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
