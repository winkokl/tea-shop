<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionPayment">
	<div class="card-body">
		<div class="mb-3">
			<label for="cod_enable" class="form-label col-md-2">{{ __('appsetting::labels.backend.appsetting.cod.enable') }}</label>
			<div class="col-md-10">
			    <label class="switch switch-3d switch-primary">
			        <input type="checkbox" name="cod_enable" class="switch-input" {{ (config('appsetting.payment.cod.enable') == 'true')?'checked="checked"':'' }}>
			        <span class="switch-label"></span>
			        <span class="switch-handle"></span>
			    </label>
			</div><!--col-->
		</div>
		<div class="mb-3">
		    <label class="col-md-3">{{__('appsetting::labels.backend.appsetting.common.charge_type')}}</label>
		    <div class="md-radio">
		        <input type="radio" {{ (config('appsetting.payment.cod.charge_type') == 'percentage')?'checked="checked"':'' }} value="percentage" class="md-radiobtn" name="cod_charge_type" id="cod_charge_type1">
		        <label for="cod_charge_type1">
		        <span class=""></span>
		        <span class="check"></span>
		        <span class="box"></span> {{__('appsetting::labels.backend.appsetting.common.percentage')}} </label>
		    </div>
		    <div class="md-radio">
		        <input type="radio" {{ (config('appsetting.payment.cod.charge_type') == 'amount')?'checked="checked"':'' }} value="amount" class="md-radiobtn" name="cod_charge_type" id="cod_charge_type2">
		        <label for="cod_charge_type2">
		        <span class=""></span>
		        <span class="check"></span>
		        <span class="box"></span> {{__('appsetting::labels.backend.appsetting.common.amount')}} </label>
		    </div>
		</div>
		<div class="mb-3">
		    <label class="col-md-3" for="paypal_charge">{{__('appsetting::labels.backend.appsetting.common.charge_amount_percentage')}}</label>
		    <input type="text" value="{{ config('appsetting.payment.cod.charge') }}" id="cod_charge" name="cod_charge" class="form-control col-md-9">
		</div>
		<div class="mb-3">
		  <label for="cod_note" class="form-label">COD Note</label>
		  <textarea class="form-control col-md-9" name="cod_note" id="cod_note" rows="3">{{ config('appsetting.payment.cod.note') }}</textarea>
		</div>
	</div>
</div>