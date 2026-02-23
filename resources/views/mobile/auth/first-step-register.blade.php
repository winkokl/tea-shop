@extends('mobile.layouts.second-master')

@section('title', __('Tea'))

@section('after-styles-end')
<link href="{{ asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
<style>
    .input-icon{
        color:#7D8FAB;
        width:16px;
        height:21px
    }
    /* .datepicker{
        background: #fff;
        color:#000000;
    }
    .datepicker th{
        text-transform: uppercase;
        font-size: 8pt;
        padding: 5px 0;
        color: #ff0000;
        text-shadow: 1px 0px 0px #fff;
        filter: dropshadow(color=#fff, offx=1, offy=0);
    } */
    .error{
    color: red;
    }
    .manual-error{
        display: none;
    }
</style>
@endsection
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
                <h2 class="title">Welcome back</h2>
                <p class="mb-0">Please register to your account</p>
                @include('mobile.includes.partials.messages')
            </div>
            <div class="card-body">
                <x-forms.post :action="route('frontend.auth.first.register.confirm')" id="firstRegisterForm">
                    <label id="name-error" class="error manual-error" for="name"></label>
                    <div class="mb-3 input-group input-group-icon">
                        <div class="input-group-text">
                            <div class="input-icon">
                                <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 7.75C10.0711 7.75 11.75 6.07107 11.75 4C11.75 1.92893 10.0711 0.25 8 0.25C5.92893 0.25 4.25 1.92893 4.25 4C4.25 6.07107 5.92893 7.75 8 7.75Z" fill="#7D8FAB"/>
                                    <path d="M15.5 16.75V18.25C15.4985 18.4488 15.4207 18.6395 15.2825 18.7825C13.61 20.455 8.57 20.5 8 20.5C7.43 20.5 2.39 20.455 0.7175 18.7825C0.579333 18.6395 0.501458 18.4488 0.5 18.25V16.75C0.5 14.7609 1.29018 12.8532 2.6967 11.4467C4.10322 10.0402 6.01088 9.25 8 9.25C9.98912 9.25 11.8968 10.0402 13.3033 11.4467C14.7098 12.8532 15.5 14.7609 15.5 16.75Z" fill="#7D8FAB"/>
                                </svg>
                            </div>
                        </div>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Your Name') }}" maxlength="100"  autofocus autocomplete="name" />
                    </div>

                    <label id="gender-error" class="error manual-error" for="gender"></label>
                    <div class="form-check mb-3">
                        <label class="form-check-label title-head mb-0 mb-0" for="gender">
                            @lang('Male')
                        </label>
                        <input class="form-check-input" type="radio" value="male" id="gender" name="gender" checked style="margin-left:1em!important;">
						<label class="form-check-label title-head mb-0 mb-0" for="gender" style="margin-left:1.5em!important;">
							@lang('Female')
						</label>
                        <input class="form-check-input" type="radio" value="female" id="gender" name="gender"  style="margin-left:1em!important;" >
					</div>

                    <label id="dob-error" class="error manual-error" for="dob"></label>
                    <div class="mb-3 input-group input-group-icon" id="date_of_birth">
                        <div class="input-group-text">
                            <div class="input-icon">
                                <i class="fa-solid fa-calendar"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control dob" name="date_of_birth" id="dob" style="color:#7D8FAB;" placeholder="Date of Birth">
                    </div>

                    <label id="email-error" class="error manual-error" for="email"></label>
                    <div class="mb-3 input-group input-group-icon">
                        <div class="input-group-text">
							<div class="input-icon">
                                <sup><i class="fa-solid fa-phone-volume"></i></sup><i class="fa-solid fa-envelope-open"></i>
							</div>
						</div>
                        <input type="text" class="form-control" name="email_or_mobile" id="email_or_mobile"  placeholder="{{ __('E-mail or phone number') }}" value="{{ old('email') }}" maxlength="255"  autofocus  autocomplete="email">
                    </div>

                    <div class="input-group">
                        <button class="btn mt-2 btn-primary w-100" type="submit">@lang('Register')</button>
                    </div>
                </x-forms.get>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End -->
@endsection
@section('after-scripts-end')
<script src="{{ asset('build/jquery-validate/jquery.validate.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.min.js')}}"></script>
<script src="{{ asset('build/jquery-validate/additional-methods.js')}}"></script>

<script>

     $(document).ready(function(){

        $('#date_of_birth').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1960,
            maxYear: parseInt(moment().format('YYYY'),10),
            autoUpdateInput: false,
            }, function(chosen_date) {
            $('#dob').val(chosen_date.format('DD-MM-YYYY'));
            $('#dob-error').css('display','none');
        });

        // add a validator method named 'maxDate'
        $.validator.addMethod("checkEmailOrPhone", function(value, element) {

            // Email validation regular expression
            var emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;

            // Phone number validation regular expression
            var phoneRegex = /^(09|\+?950?9|\+?95950?9)\d{9}$/;

            return this.optional(element) || emailRegex.test(value) || phoneRegex.test(value);

        }, 'Invalid email or phone number');

        $("#firstRegisterForm").validate({
            rules: {
                email: {
                    required: true,
                    checkEmailOrPhone: true
                },
                name: {
                    required: true,
                    maxlength:100
                },
                gender: {
                    required: true,
                },
                date_of_birth: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Please enter email address or phone number",
                    checkEmailOrPhone: "Invalid email address or phone number",
                },
                name: {
                    required: 'Please enter your name',
                    maxlength: 'Maximum length is 100 characters'
                },
                gender: {
                    required: 'Please select a gender'
                },
                date_of_birth: {
                    required: 'Please select a date'
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

     });
</script>
@endsection
