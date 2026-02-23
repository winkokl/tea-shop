@extends('frontend.layouts.app')

@section('title', __('Register'))

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
    {{ style('assets/plugins/daterangepicker/daterangepicker.css') }}
    {{ style('assets/css/frontend.css') }}
@endpush

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Register to Tea')
                    </x-slot>

                    <x-slot name="body">
                        <x-forms.post :action="route('frontend.auth.first.register.confirm')" id="firstRegisterForm">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Name')<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Name') }}" maxlength="100" required autofocus autocomplete="name" />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right gender" style="margin-top: 9px;">@lang('Gender')<span class="text-danger">*</span></label>
                                <div class="col-md-6">

                                    <div class="form-check form-check-inline">

                                        <label>
                                            <input type="radio" class="option-input radio" value="male" name="gender" checked />
                                            @lang('Male')
                                        </label>
                                        <label>
                                            <input type="radio" class="option-input radio" value="female" name="gender" />
                                            @lang('Female')
                                        </label>
                                    </div>
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">@lang('Date of Birth')<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <div class="input-group" id="date_of_birth">
                                        <input type="text" name="date_of_birth" id="dob" class="form-control" value="{{ old('date_of_birth') }}" placeholder="{{ __('Date of Birth') }}" maxlength="100" autofocus autocomplete="date_of_birth" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">@lang('E-mail Address or Phone No')<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input type="text" name="email_or_mobile" id="email_or_mobile" class="form-control" placeholder="{{ __('E-mail Address or Phone No') }}" value="{{ old('mobile') }}" maxlength="255" required autocomplete="" />
                                </div>
                            </div><!--form-group-->

                            {{--<div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" name="terms" value="1" id="terms" class="form-check-input" required>
                                        <label class="form-check-label" for="terms">
                                            @lang('I agree to the') <a href="{{ route('frontend.pages.terms') }}" target="_blank">@lang('Terms & Conditions')</a>
                                        </label>
                                    </div>
                                </div>
                            </div><!--form-group-->--}}

                            @if(config('boilerplate.access.captcha.registration'))
                                <div class="row">
                                    <div class="col">
                                        @captcha
                                        <input type="hidden" name="captcha_status" value="true" />
                                    </div><!--col-->
                                </div><!--row-->
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">@lang('Register')</button>
                                </div>
                            </div><!--form-group-->
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection

@push('after-scripts')
{{ script('assets/plugins/select2/js/select2.full.min.js')}}
{{ script("assets/plugins/select2/component/components-select2.js") }}
{{ script("assets/plugins/daterangepicker/moment.min.js") }}
{{ script("assets/plugins/daterangepicker/daterangepicker.min.js") }}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $(function() {
      $('#date_of_birth').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1960,
        maxYear: parseInt(moment().format('YYYY'),10),
        autoUpdateInput: false,
        }, function(chosen_date) {
        $('#dob').val(chosen_date.format('DD-MM-YYYY'));
      });
    });

    $(document).ready(function() {
      $('#firstRegisterForm').validate({
        rules: {
          name: {
            required: true,
            minlength: 4
          },
          email_or_mobile: {
            required: true
          }
        },
        messages: {
          name: {
            required: 'Please enter your name'
          },
          email_or_mobile: {
            required: 'Please enter your email or mobile'
          }
        },
        submitHandler: function(form) {
          // Handle the form submission
          form.submit();
        }
      });

            $('#email_or_mobile').on('change', function() {
                var value = $(this).val();
            console.log(value)
                $('#email_or_mobile').rules('remove');

                if ($.isNumeric(value)) {
                  $('#email_or_mobile').rules('add', {
                    number: true,
                    minlength: 8,
                    maxlength: 11
                  });
                } else {
                  $('#email_or_mobile').rules('add', {
                    email:true
                  });
                }
              });
    });
</script>

@endpush
