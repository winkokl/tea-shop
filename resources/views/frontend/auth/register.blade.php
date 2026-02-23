@extends('frontend.layouts.app')

@section('title', __('Register'))

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
@endpush

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Register')
                    </x-slot>

                    <x-slot name="body">
                        <x-forms.post :action="route('frontend.auth.register')" id="registerForm">
                        {{--
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">@lang('nrc')</label>

                                <div class="col-md-8">
                                    <input type="text" name="nrc" id="nrc" class="form-control" placeholder="{{ __('nrc') }}" value="{{ old('nrc') }}" maxlength="255" autocomplete="nrc" />
                                </div>
                            </div><!--form-group-->
                        --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">@lang('nrc')</label>

                                
                                    <div class="col-2">
                                        <select name="nrc_code" class="form-control" id="nrc_code">
                                          <option></option>
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

                                    <div class="col-2">
                                        <select name="nrc_city_name" class="form-control" id="nrc_city_name" disabled>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select name="nrc_type" class="form-control" id="nrc_type">
                                          <option value="{{ __('strings.code.type_one') }}">{{ __('strings.code.type_one') }}</option>
                                          <option value="{{ __('strings.code.type_two') }}">{{ __('strings.code.type_two') }}</option>
                                          <option value="{{ __('strings.code.type_three') }}">{{ __('strings.code.type_three') }}</option>
                                          <option value="{{ __('strings.code.type_four') }}">{{ __('strings.code.type_four') }}</option>
                                          <option value="{{ __('strings.code.type_five') }}">{{ __('strings.code.type_five') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" id="nrc_no" name="nrc_code_number" placeholder="000000" style="height: 34px;">
                        
                                    </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Region')<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select name="region_id" id="region_id" class="form-control" required="required">
                                        
                                        <option></option>
                                        @foreach ($regions as $key => $value)
                                            <option value="{{ $key }}" name="region_id">{{ $value }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div><!--col-->
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Township')<span class="text-danger">*</span></label>

                                <div class="col-md-8">
                                    <select name="township_id" id="township_id" class="form-control select2" disabled>
                                        <option></option>                              
                                    </select>
                                </div><!--col-->
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Address Detail')</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="address" placeholder="{{ __('Address Detail') }}"></textarea>
                                </div>                                
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Password')<span class="text-danger">*</span></label>

                                <div class="col-md-8">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="new-password" />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Password Confirmation')<span class="text-danger">*</span></label>

                                <div class="col-md-8">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="new-password" />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" name="terms" value="1" id="terms" class="form-check-input" required>
                                        <label class="form-check-label" for="terms">
                                            @lang('I agree to the') <a href="{{ route('frontend.pages.terms') }}" target="_blank">@lang('Terms & Conditions')</a>
                                        </label>
                                    </div>
                                </div>
                            </div><!--form-group-->

                            @if(config('boilerplate.access.captcha.registration'))
                                <div class="row">
                                    <div class="col">
                                        @captcha
                                        <input type="hidden" name="captcha_status" value="true" />
                                    </div><!--col-->
                                </div><!--row-->
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary" type="submit">@lang('GET STARTED')</button>
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
<script>
    $('#region_id').select2({
       placeholder: "Choose Region or State"
    });

    $('#township_id').select2({
       placeholder: "Choose Township"
    });

    $('#nrc_code').select2({
       placeholder: "Choose"
    });

    $('#nrc_city_name').select2({
       placeholder: "Choose"
    });

    $('#nrc_type').select2({
        placeholder: "Choose"
    });


    $('#nrc_code').on('change', function(){
        
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
                        $('#nrc_city_name').append($('<option></option>') .attr('selected',true).text('Seletct'));

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

    $('#region_id').on('select2:select', function(){
        
        var cityId = $(this).val();
        if(cityId){
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
                        $('#township_id').append($('<option></option>') .attr('selected',true).text('Seletct Township'));

                        $.each(data, function(i, value) {
                            if ('{{app()->getLocale()}}' == 'en') {
                                $('#township_id').append($('<option></option>').attr('value', value.id).text(value.name ));
                                $('#township_id').trigger('change');
                            } else {
                                $('#township_id').append($('<option></option>').attr('value', value.id).text(value.mm_name ));
                                $('#township_id').trigger('change');      
                            }  
                            
                        });    
                        $('#township_id').removeAttr('disabled','disabled');

                        
                    }  
                }, 
            });
        }else{
        $('#township_id').attr('disabled','disabled');  
        } 
    });
</script>

@endpush