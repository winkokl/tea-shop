@extends('mobile.layouts.second-master')

@section('title', __('Tea'))

@section('after-styles-end')
  <style>
    .error{
        color: red;
    }
    .manual-error{
        display: none;
    }
 </style>
@endsection

@section('content')
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
                <h2 class="title">Forgot Password</h2>
                <p class="mb-0">Please enter to your email</p>
                @include('mobile.includes.partials.messages')
            </div>
            <div class="card-body">
                <x-forms.post :action="route('frontend.auth.password.email')" id="forgetPasswordForm">
                <div class="mb-3 input-group input-group-icon">
                    <div class="input-group-text">
                        <div class="input-icon">
                            <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 7.75C10.0711 7.75 11.75 6.07107 11.75 4C11.75 1.92893 10.0711 0.25 8 0.25C5.92893 0.25 4.25 1.92893 4.25 4C4.25 6.07107 5.92893 7.75 8 7.75Z" fill="#7D8FAB"></path>
                                <path d="M15.5 16.75V18.25C15.4985 18.4488 15.4207 18.6395 15.2825 18.7825C13.61 20.455 8.57 20.5 8 20.5C7.43 20.5 2.39 20.455 0.7175 18.7825C0.579333 18.6395 0.501458 18.4488 0.5 18.25V16.75C0.5 14.7609 1.29018 12.8532 2.6967 11.4467C4.10322 10.0402 6.01088 9.25 8 9.25C9.98912 9.25 11.8968 10.0402 13.3033 11.4467C14.7098 12.8532 15.5 14.7609 15.5 16.75Z" fill="#7D8FAB"></path>
                            </svg>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="email" id="email"  placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255"  autofocus  autocomplete="email">
                </div>
                <button class="btn mt-2 btn-primary w-100"> @lang('Send Password Reset Link')</button>
                </x-forms.post>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End -->
@endsection
@section('after-scripts-end')
<script src="{{ asset('build/jquery-validate/jquery.validate.js')}}"></script>
<script src="{{ asset('build/jquery-validate/additional-methods.js')}}"></script>
<script>
    $(document).ready(function(){

       //Validation
       $.validator.addMethod("checkEmail", function(value, element) {

        // Email validation regular expression
        var emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;

        return this.optional(element) || emailRegex.test(value) ;

        }, 'Invalid email');

       $("#forgetPasswordForm").validate({
           rules: {
               email: {
                   required: true,
                   checkEmail: true
               }
           },
           messages: {
               email: {
                   required: 'Your email field is required!',
                   checkEmail: 'Invalid email'
               }
           },
           submitHandler: function(form) {
               form.submit();
           }
       });
    });

</script>
@endsection
