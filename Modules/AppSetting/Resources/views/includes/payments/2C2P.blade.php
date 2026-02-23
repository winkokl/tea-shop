<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionPayment">
    
    <div class="card-body">
        <div class="mb-3">
            <label for="2c2p_enable" class="form-label col-md-2">{{ __('appsetting::labels.backend.appsetting.common.enable') }}</label>
            <div class="col-md-10">
                <label class="switch switch-3d switch-primary">
                    <input type="checkbox" name="2c2p_enable" class="switch-input" {{ (config('appsetting.payment.2c2p.enable') == 'true')?'checked="checked"':'' }}>
                    <span class="switch-label"></span>
                    <span class="switch-handle"></span>
                </label>
            </div><!--col-->       
        </div>
        <div class="mb-3">
            <label for="2c2p_version" class="form-label">{{ __('appsetting::labels.backend.appsetting.version') }}</label>
            <input type="text" name="2c2p_version" class="form-control col-md-9" id="" placeholder="" value="{{ config('appsetting.payment.2c2p.version') }}">
        </div>
        <div class="mb-3">
            <label for="2c2p_currency" class="form-label">{{__('appsetting::labels.backend.appsetting.currency') }}</label>
            <input type="text" class="form-control col-md-9" name="2c2p_currency" id="" placeholder="" value="{{ config('appsetting.payment.2c2p.currency') }}">
        </div>
        <div class="mb-3">
            <label for="2c2p_secret_key" class="form-label">{{__('appsetting::labels.backend.appsetting.secret')}}</label>
            <input type="text" class="form-control col-md-9" name="2c2p_secret_key" id="" placeholder="" value="{{ config('appsetting.payment.2c2p.secret_key') }}" readonly>
        </div>
        <div class="mb-3">
            <label for="2c2p_payment_url" class="form-label">Payment Url</label>
            <input type="text" class="form-control col-md-9" name="2c2p_payment_url" id="" placeholder="" value="{{ config('appsetting.payment.2c2p.payment_url') }}" readonly>
        </div>
        <div class="mb-3">
            <label for="2c2p_frontend_url" class="form-label">Frontend Url</label>
            <input type="text" class="form-control col-md-9" name="2c2p_frontend_url" id="" placeholder="" value="{{ config('appsetting.payment.2c2p.frontend_url') }}" readonly>
        </div>
        <div class="mb-3">
            <label for="2c2p_backend_url" class="form-label">Backend Url</label>
            <input type="text" class="form-control col-md-9" name="2c2p_backend_url" id="" value="{{ config('appsetting.payment.2c2p.backend_url') }}" readonly>
        </div>
        <div class="mb-3">
            <label class="col-md-3">{{ __('appsetting::labels.backend.appsetting.common.charge_type') }}</label>
            <div class="md-radio">
                <input type="radio" {{ (config('appsetting.payment.2c2p.charge_type') == 'percentage')?'checked="checked"':'' }} value="percentage" class="md-radiobtn" name="2c2p_charge_type" id="2c2p_charge_type1">
                <label for="2c2p_charge_type1">
                <span class=""></span>
                <span class="check"></span>
                <span class="box"></span> {{ __('appsetting::labels.backend.appsetting.common.percentage') }} </label>
            </div>
            <div class="md-radio">
                <input type="radio" {{ (config('appsetting.payment.2c2p.charge_type') == 'amount')?'checked="checked"':'' }} value="amount" class="md-radiobtn" name="2c2p_charge_type" id="2c2p_charge_type2">
                <label for="2c2p_charge_type2">
                <span class=""></span>
                <span class="check"></span>
                <span class="box"></span> {{ __('appsetting::labels.backend.appsetting.common.amount') }} </label>
            </div>
        </div>
        <div class="mb-3">
            <label class="col-md-3" for="paypal_charge">{{ __('appsetting::labels.backend.appsetting.common.charge_amount_percentage') }}</label>
            <input type="text" value="{{ config('appsetting.payment.2c2p.charge') }}" id="2c2p_charge" name="2c2p_charge" class="form-control col-md-9">
        </div>
    </div>
</div>
