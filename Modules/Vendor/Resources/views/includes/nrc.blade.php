<div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-md-2">{{__('customer::labels.backend.customer.table.nrc')}}</label>
    <div class="col-md-2">
        
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
    <div class="col-md-3">
        <select name="nrc_city_name" class="form-control" id="nrc_city_name" disabled>
            <option></option>
        </select>
    </div>
    <div class="col-md-2">
        <select name="nrc_type" class="form-control" id="nrc_type">
          <option></option>
          <option value="{{ __('strings.code.type_one') }}">{{ __('strings.code.type_one') }}</option>
          <option value="{{ __('strings.code.type_two') }}">{{ __('strings.code.type_two') }}</option>
          <option value="{{ __('strings.code.type_three') }}">{{ __('strings.code.type_three') }}</option>
          <option value="{{ __('strings.code.type_four') }}">{{ __('strings.code.type_four') }}</option>
          <option value="{{ __('strings.code.type_five') }}">{{ __('strings.code.type_five') }}</option>
        </select>
    </div>
    <div class="col-md-3">
        <input type="number" class="form-control" oninput="this.value = this.value.slice(0, 6)" id="nrc_no" name="nrc_code_number" placeholder="000000">

    </div>
  </div>