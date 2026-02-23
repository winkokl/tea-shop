@extends('mobile.layouts.second-master')

{{-- @section('title', __('Tea')) --}}
@section('title', __('Tea'))

@section('content')
 <div class="page-content">
    <!-- Banner -->
    <div class="banner-wrapper mb-0 py-3">
        <div class="container inner-wrapper">
            <a href="{{route('frontend.index')}}" class="side-menu-logo">
                {{-- <img src="{{asset('mobile/assets/images/svg/tea-light-green-logo.png')}}" alt="/"> --}}
                <img src="#" alt="/">
            </a>
        </div>
    </div>
    <!-- Banner End -->
    <div class="container">
        <div class="card dz-form-group">
            <div class="card-header">
                <h2 class="title">@lang('Choose your language')</h2>
            </div>
            <div class="card-body">
                <x-forms.post :action="route('frontend.change_language')" id="changeLanguageForm">
                    <div class="input-group form-item input-select">
                        <div class="form-check mb-3">
                            <label class="form-check-label title-head mb-0 mb-0" for="language">
                                @lang('Myanmar')
                            </label>
                            <input class="form-check-input" type="radio" value="mm" id="language" name="language" @if('mm' === app()->getLocale()) checked @endif style="margin-left:1em!important;">
                            <label class="form-check-label title-head mb-0 mb-0" for="language" style="margin-left:1.5em!important;">
                                @lang('English')
                            </label>
                            <input class="form-check-input" type="radio" value="en" id="language" name="language"  @if('en' === app()->getLocale()) checked @endif style="margin-left:1em!important;" >
                        </div>
                    </div>
                    <div class="input-group">
                        <button class="btn mt-2 btn-primary w-100" type="submit" >@lang('Save')</button>
                    </div>
                </x-forms.post>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End -->
@endsection
