@extends('mobile.layouts.second-master')

@section('title', __('Tea'))

@section('after-styles-end')
<link href="{{ asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet">
<style>
    .input-icon{
        color:#7D8FAB;
        width:16px;
        height:21px
    }
    .datepicker{
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
    }
    .error{
        color: red;
    }
    .manual-error{
        display: none;
    }
    .select2-container--bootstrap .select2-selection--single {
        background: #E8EFF3;
        color:#6d898f!important;
        height: 50px;
        padding-top:15px;
        border-radius: 12px;
        border: 2px solid #afd2e5;
        font-weight: 450;
        font-size:1em;
    }
    .select2-container--bootstrap.select2-container--open .select2-selection {
        border-color:#555;
    }
    .select2-container--open .select2-dropdown--below {
        border:2px solid #555;
        border-top: none;
    }
    .select2-container--bootstrap .select2-selection--single .select2-selection__placeholder {
        color: #7d8fab;
    }
    .select2-container--bootstrap .select2-selection--single .select2-selection__rendered {
        color: #000;
        padding:0px 0px 3px 2px;
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
                <h2 class="title" style="text-align: center">Enter Your Info</h2>
                {{-- <p class="mb-0">Please register to your account</p> --}}
                @include('mobile.includes.partials.messages')
            </div>
            <div class="card-body">
                <x-forms.post :action="route('frontend.auth.register')" id="registerForm">
                    <label id="nrc" class="nrc" for="nrc">Select your NRC number/ ID card</label>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class=" me-3 input-group input-group-icon w-75">
                            <label id="nrc_code-error" class="error manual-error" for="nrc_code"></label>
                            <div class="form-item">
								<select name="nrc_code" id="nrc_code" class="form-control nrc_code">
                                    <option value="{{ __('strings.code.kachin_code') }}kachin" code="kachin">{{ __('strings.code.kachin_code') }}</option>
                                    <option value="{{ __('strings.code.kayah_code') }}kayah">{{ __('strings.code.kayah_code') }}</option>
                                    <option value="{{ __('strings.code.kayin_code') }}kayin">{{ __('strings.code.kayin_code') }}</option>
                                    <option value="{{ __('strings.code.chin_code') }}chin">{{ __('strings.code.chin_code') }}</option>
                                    <option value="{{ __('strings.code.sagaing_code') }}sagaing">{{ __('strings.code.sagaing_code') }}</option>
                                    <option value="{{ __('strings.code.tanintharyi_code') }}tanintharyi">{{ __('strings.code.tanintharyi_code') }}</option>
                                    <option value="{{ __('strings.code.bago_code') }}bago">{{ __('strings.code.bago_code') }}</option>
                                    <option value="{{ __('strings.code.magwe_code') }}magwe">{{ __('strings.code.magwe_code') }}</option>
                                    <option value="{{ __('strings.code.mandalay_code') }}mandalay">{{ __('strings.code.mandalay_code') }}</option>
                                    <option value="{{ __('strings.code.mon_code') }}mon">{{ __('strings.code.mon_code') }}</option>
                                    <option value="{{ __('strings.code.rakhine_code') }}rakhine">{{ __('strings.code.rakhine_code') }}</option>
                                    <option value="{{ __('strings.code.yangon_code') }}yangon">{{ __('strings.code.yangon_code') }}</option>
                                    <option value="{{ __('strings.code.shan_code') }}shan">{{ __('strings.code.shan_code') }}</option>
                                    <option value="{{ __('strings.code.ayeyawady_code') }}ayeyawady">{{ __('strings.code.ayeyawady_code') }}</option>
                                    <option value="{{ __('strings.code.naypyitaw_code') }}naypyitaw">{{ __('strings.code.naypyitaw_code') }}</option>
                                </select>
							</div>
						</div>
						<div class="me-3 input-group input-group-icon w-200">
                            <label id="nrc_city_name-error" class="error manual-error" for="nrc_city_name"></label>
							<div class="form-item">
								<select name="nrc_city_name" id="nrc_city_name" class="form-control nrc_city_name" disabled>
                                    <option></option>
                                </select>
							</div>
						</div>
                        <div class="input-group input-group-icon w-75">
                            <label id="nrc_type-error" class="error manual-error" for="nrc_type"></label>
							<div class="form-item">
								<select name="nrc_type" id="nrc_type" class="form-control nrc_type">
                                    <option value="{{ __('strings.code.type_one') }}">{{ __('strings.code.type_one') }}</option>
                                    <option value="{{ __('strings.code.type_two') }}">{{ __('strings.code.type_two') }}</option>
                                    <option value="{{ __('strings.code.type_three') }}">{{ __('strings.code.type_three') }}</option>
                                    <option value="{{ __('strings.code.type_four') }}">{{ __('strings.code.type_four') }}</option>
                                    <option value="{{ __('strings.code.type_five') }}">{{ __('strings.code.type_five') }}</option>
                                </select>
							</div>
						</div>
					</div>
                    <div class="input-group input-group-icon" style="margin-top:-1.5em;margin-bottom:0px;">
                        <div class="form-item">
                            <input type="number" class="form-control" placeholder="000000" name="nrc_no" id="nrc_no">
                        </div>
                    </div>

                    <label  for="city_id">Choose Region / State</label>
                    <label id="city_id-error" class="error manual-error" for="city_id"></label>
                    <div class="mb-3 input-group input-group-icon">
                        <select name="city_id" id="city_id" class="mb-2 form-control">
                            <option></option>
                            @foreach ($cities as $key => $city)
                            <option value="{{ $key }}" name="city_id" {{ $city == old('city') ? ' selected' : ''}}>{{ $city }}</option>
                            @endforeach
						</select>
                    </div>

                    <label for="township_id">Choose Township</label>
                    <label id="township_id-error" class="error manual-error" for="township_id"></label>
                    <div class="mb-3 input-group input-group-icon form-item input-select">
                        <select name="township_id" id="township_id" class="mb-2 form-control"  disabled>
                            <option></option>
						</select>
                    </div>

                    <label for="address">Enter your address</label>
                    <label id="address-error" class="error manual-error" for="address"></label>
                    <div class="input-group mb-3 input-group-icon">
                        <textarea class="form-control" placeholder="Enter your address" rows="4" style="height:90px;" name="address" id="address"></textarea>
                    </div>

                    <label for="password">Enter Password</label>
                    <label id="password-error" class="error manual-error" for="password"></label>
                    <div class="mb-3 input-group input-group-icon">
                        <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="new-password" />
                        <span class="input-group-text show-pass">
                            <i class="fa fa-eye-slash text-primary"></i>
                            <i class="fa fa-eye text-primary"></i>
                        </span>
                    </div>

                    <label for="password_confirmation">Enter Confirmation Password</label>
                    <label id="password_confirmation-error" class="error manual-error" for="password_confirmation"></label>
                    <div class="mb-3 input-group input-group-icon">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="new-password" />
                        <span class="input-group-text show-pass-confirm">
                            <i class="fa fa-eye-slash text-primary"></i>
                            <i class="fa fa-eye text-primary"></i>
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-check mb-2">
                            <input type="checkbox" name="terms" id="terms" class="form-check-input" value="1">
                            <label class="form-check-label text-soft font-12" for="flexCheckChecked">
                               I accept <a href="{{ route('frontend.pages.terms') }}" class="text-primary">Terms and Conditions and Privacy Policy</a>
                            </label>
                        </div>
                    </div>
                    <div class="input-group">
                        <button class="btn mt-2 btn-primary w-100 get-start" disabled id="get-start">GET STARTED</button>
                    </div>
                    <div class="text-center">
                        <a href="{{route('frontend.auth.login')}}" class="saprate text-soft px-1">Already have account? <b class="text-primary">Sign In</b></a>
                    </div>
                </x-forms.post>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End -->
@endsection
@section('after-scripts-end')
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/select2/component/components-select2.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('build/jquery-validate/jquery.validate.js')}}"></script>
<script src="{{ asset('build/jquery-validate/additional-methods.js')}}"></script>
<script>
     $(document).ready(function(){

        $('#nrc_code').select2();

        $('#nrc_city_name').select2();

        $('#nrc_type').select2();

        $('#city_id').select2({
            placeholder: "Region / State",
        });

        $('#township_id').select2({
            placeholder: "Township"
        });


        $('#city_id').on('select2:select',function(){
            var cityId = $(this).val();
            if(cityId){
                $('#city_id-error').css('display','none');
                var township_id= $('#township_id').val();
                $('#township_id').empty();

                $('#township_id').removeAttr('disabled','disabled');
                $.ajax({
                    url: "{{ url('customer/get-townships/') }}/"+cityId,
                    type: 'GET',
                    success: function (data){
                        if(data.length == 0) {

                            $('#township_id').attr('disabled','disabled');
                            $('#township_id').find('option').remove().end();
                            $('#township_id').hide();
                            $('#township_text').show();


                            }else {
                            $('#township_id').show();
                            $('#township_id').removeAttr('disabled','disabled');
                            $('#township_text').hide();
                            $('#township_id').find('option').remove().end();
                            // $('#township_id').append($('<option></option>') .attr('selected',true).text('Township'));

                            $.each(data, function(i, value) {

                                $('#township_id').append($('<option></option>').attr('value', value.id).text(value.name ));
                                $('#township_id').trigger('change');

                            });
                            $('#township_id').removeAttr('disabled','disabled');


                        }
                    },
                });
            }else{
                $('#township_id').attr('disabled','disabled');
            }
        });

        $('#nrc_code').on('select2:select', function(){

            var nrcCode = $(this).val().split('/');

            if(nrcCode){
                var nrc_city_name= $('#nrc_city_name').val();
                $('#nrc_city_name').empty();

                $('#nrc_city_name').removeAttr('disabled','disabled');
                $.ajax({
                    url: "{{ url('customer/get-nrc-name/') }}/"+nrcCode[1],
                    type: 'GET',
                    success: function (data){
                        if(data.length == 0) {

                            $('#nrc_city_name').attr('disabled','disabled');
                            $('#nrc_city_name').find('option').remove().end();
                            $('#nrc_city_name').hide();
                            $('#nrc_city_text').show();


                        }else {
                            $('#nrc_city_name').show();
                            $('#nrc_city_name').removeAttr('disabled','disabled');
                            $('#nrc_city_text').hide();
                            $('#nrc_city_name').find('option').remove().end();
                            // $('#nrc_city_name').append($('<option></option>') .attr('selected',true).text('Seletct'));

                            $.each(data, function(i, value) {
                                if ('{{app()->getLocale()}}' == 'en') {
                                    $('#nrc_city_name').append($('<option></option>').attr('value', value.code).text(value.code ));
                                    $('#nrc_city_name').trigger('change');
                                } else {
                                    $('#nrc_city_name').append($('<option></option>').attr('value', value.code_mm).text(value.code_mm ));
                                    $('#nrc_city_name').trigger('change');
                                }

                            });
                            $('#nrc_city_name').removeAttr('disabled','disabled');


                        }
                    },
                });
            }else{
            $('#nrc_city_name').attr('disabled','disabled');
            }
        });

        //Validation

        $("#registerForm").validate({
            rules: {
                nrc_code: {
                    required: true
                },
                nrc_city_name: {
                    required: true
                },
                nrc_type: {
                    required: true
                },
                nrc_no: {
                    required: true
                },
                city_id: {
                    required: true
                },
                township_id: {
                    required: true
                },
                address: {
                    required: true
                },
                password: {
                    required: true
                },
                password_confirmation: {
                    required: true
                }
            },
            messages: {
                nrc_code: {
                    required: '<sub>**</sub> required <sub>**</sub>'
                },
                nrc_city_name: {
                    required: '<sub>**</sub> required <sub>**</sub>'
                },
                nrc_type: {
                    required: '<sub>**</sub> required <sub>**</sub>'
                },
                nrc_no: {
                    required: '<sub>**</sub> required nrc no<sub>**</sub>'
                },
                city_id: {
                    required: '<sub>**</sub> required <sub>**</sub>'
                },
                township_id: {
                    required: '<sub>**</sub> required <sub>**</sub>'
                },
                address: {
                    required: '<sub>**</sub> required <sub>**</sub>'
                },
                password: {
                    required: '<sub>**</sub> required <sub>**</sub>'
                },
                password_confirmation: {
                    required: '<sub>**</sub> required <sub>**</sub>'
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        $('#terms').change(function() {
            if ($(this).is(':checked')) {
            // Checkbox is checked, enable the button
            $('#get-start').prop('disabled', false);
            } else {
            // Checkbox is unchecked, disable the button
            $('#get-start').prop('disabled', true);
            }
        });

        $('#password_confirmation').on('keyup', function() {
            validatePassword();
            $('#password-error').css('display','inline-block');
        });

        function validatePassword() {
            var password = $('#password').val();
            var passwordConfirm = $('#password_confirmation').val();
            var passwordError = $('#password-error');

            if (password !== passwordConfirm) {
            passwordError.text("Passwords do not match");
            } else if (password.length < 8) {
            passwordError.text("Password must be at least 8 characters long");
            } else {
            passwordError.text("");
            }
        }

     });
</script>
@endsection




























