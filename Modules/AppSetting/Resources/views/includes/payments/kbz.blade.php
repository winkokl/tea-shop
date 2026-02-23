<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionPayment">
	
  	<div class="card-body">
  		<div class="mb-3">
            <label for="kbz_enable" class="form-label col-md-2">{{ __('appsetting::labels.backend.appsetting.common.enable') }}</label>
            <div class="col-md-10">
                <label class="switch switch-3d switch-primary">
                    <input type="checkbox" name="kbz_enable" class="switch-input" {{ (config('appsetting.payment.kbz.enable') == 'true')?'checked="checked"':'' }}>
                    <span class="switch-label"></span>
                    <span class="switch-handle"></span>
                </label>
            </div><!--col--> 
  		</div>
  		<div class="mb-3">
  		    <label for="kbz_version" class="form-label">{{ __('appsetting::labels.backend.appsetting.version') }}</label>
  		    <input type="text" name="kbz_version" class="form-control col-md-9" id="" placeholder="" value="{{ config('appsetting.payment.kbz.version') }}" readonly="true">
  		</div>
  		<div class="mb-3">
  		    <label for="kbz_app_id" class="form-label">{{ __('appsetting::labels.backend.appsetting.kbz.app_id') }}</label>
  		    <input type="text" name="kbz_app_id" class="form-control col-md-9" id="" placeholder="" value="{{ config('appsetting.payment.kbz.app_id') }}" readonly="true">
  		</div>
  		<div class="mb-3">
  		    <label for="kbz_merchant_code" class="form-label">{{__('appsetting::labels.backend.appsetting.kbz.merchant_code') }}</label>
  		    <input type="text" class="form-control col-md-9" name="kbz_merchant_code" id="" placeholder="" value="{{ config('appsetting.payment.kbz.merchant_code') }}" readonly>
  		</div>
  		<div class="mb-3">
  		    <label for="kbz_merchant_key" class="form-label">{{__('appsetting::labels.backend.appsetting.kbz.merchant_key') }}</label>
  		    <input type="text" class="form-control col-md-9" name="kbz_merchant_key" id="" placeholder="" value="{{ config('appsetting.payment.kbz.merchant_key') }}" readonly>
  		</div>
  		<div class="mb-3">
  		    <label for="kbz_currency" class="form-label">{{__('appsetting::labels.backend.appsetting.currency') }}</label>
  		    <input type="text" class="form-control col-md-9" name="kbz_currency" id="" placeholder="" value="{{ config('appsetting.payment.kbz.currency') }}" readonly>
  		</div>
	    <div class="mb-3">
	      	<label for="paymentUrl" class="form-label">{{ __('appsetting::labels.backend.appsetting.kbz.payment_url') }}</label>
	      	<input type="text" class="form-control col-md-9" id="" placeholder="" name="kbz_payment_url" value="{{ config('appsetting.payment.kbz.payment_url') }}">
	    </div>
	    <div class="mb-3">
	      	<label for="frontend_url" class="form-label">{{ __('appsetting::labels.backend.appsetting.kbz.frontend_url') }}</label>
	      	<input type="text" class="form-control col-md-9" id="" placeholder="" name="kbz_frontend_url" value="{{ config('appsetting.payment.kbz.frontend_url') }}">
	    </div>
	    <div class="mb-3">
	      	<label for="backend_url" class="form-label">{{ __('appsetting::labels.backend.appsetting.kbz.backend_url') }}</label>
	      	<input type="text" class="form-control col-md-9" id="" placeholder="" name="kbz_backend_url" value="{{ config('appsetting.payment.kbz.backend_url') }}">
	    </div>
	    <div class="mb-3">
	        <label class="col-md-3">Charge Type</label>
	        <div class="md-radio">
	            <input type="radio" {{ (config('appsetting.payment.kbz.charge_type') == 'percentage')?'checked="checked"':'' }} value="percentage" class="md-radiobtn" name="kbz_charge_type" id="kbz_charge_type1">
	            <label for="kbz_charge_type1">
	            <span class=""></span>
	            <span class="check"></span>
	            <span class="box"></span> Percentage </label>
	        </div>
	        <div class="md-radio">
	            <input type="radio" {{ (config('appsetting.payment.kbz.charge_type') == 'amount')?'checked="checked"':'' }} value="amount" class="md-radiobtn" name="kbz_charge_type" id="kbz_charge_type2">
	            <label for="kbz_charge_type2">
	            <span class=""></span>
	            <span class="check"></span>
	            <span class="box"></span> Amount </label>
	        </div>
	    </div>
	    <div class="mb-3">
	        <label class="col-md-3" for="paypal_charge">Charge Amount/Percentage</label>
	        <input type="text" value="{{ config('appsetting.payment.kbz.charge') }}" id="kbz_charge" name="kbz_charge" class="form-control col-md-9">
	    </div>
  	</div>
	
</div>