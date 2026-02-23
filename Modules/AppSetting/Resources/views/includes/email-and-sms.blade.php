<div class="tab-pane fade" id="emailAndSms" role="tabpanel" aria-labelledby="email-sms-tab">
     {{ html()->form('POST',route('admin.appsetting.store'))->class('form-horizontal')->open() }} 
     {!! html()->hidden('tab','emailAndSms') !!}

     <div class="mt-4 border">
        <div class="card m-2 border card-accent-primary">
            <div class="card-header bg-info">
                <h4>{{__('appsetting::labels.backend.appsetting.email_and_sms.sms')}}</h4>
            </div>
            <div class="card-body border mb-4">
                <div class="card-header">
                    {{__('appsetting::labels.backend.appsetting.email_and_sms.sms_poh')}}
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label">{{__('appsetting::labels.backend.appsetting.common.enable')}}</label>
                    <div class="col-md-10">
                        <label class="switch switch-3d switch-primary">
                            <input type="checkbox" name="sms_poh_enable" class="switch-input" {{ (config('sms.sms_poh_enable')) ? 'checked' : ''}}>
                            <span class="switch-label"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div><!--col-->
                </div>
                <div class="form-group row form-md-line-input">
                    <label class="col-md-2 form-control-label">{{__('appsetting::labels.backend.appsetting.email_and_sms.sender_name')}}</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="sms_poh_sender_name" placeholder="{{__('appsetting::labels.backend.appsetting.email_and_sms.sender_name')}}" value="{{config('sms.sms_poh_sender_name')}}" required>
                    </div>
                </div>
                <div class="form-group row form-md-line-input">
                    <label class="col-md-2 form-control-label">{{__('appsetting::labels.backend.appsetting.email_and_sms.host')}}</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="sms_poh_host" placeholder="{{__('appsetting::labels.backend.appsetting.email_and_sms.host')}}" value="{{config('sms.sms_poh_host')}}" readonly>
                    </div>
                </div>
                <div class="form-group row form-md-line-input">
                    <label class="col-md-2 form-control-label">{{__('appsetting::labels.backend.appsetting.email_and_sms.token')}}</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="sms_poh_token" placeholder="{{__('appsetting::labels.backend.appsetting.email_and_sms.token')}}" value="{{config('sms.sms_poh_token')}}" readonly>
                    </div>
                </div>
            </div>
        
            <div class="card-header mt-2 bg-info">
                <h4>{{__('appsetting::labels.backend.appsetting.email_and_sms.email')}}</h4>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="emailDriver" class="col-md-2 col-form-label">{{__('appsetting::labels.backend.appsetting.email_and_sms.mail_driver')}}</label>
                    <div class="col-md-10">
                      <input type="text" readonly name="" class="form-control" id="emailDriver" value="{{ config('appsetting.email.mail_driver') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mailHost" class="col-md-2 col-form-label">{{__('appsetting::labels.backend.appsetting.email_and_sms.mail_host')}}</label>
                    <div class="col-md-10">
                      <input type="text" readonly name="" class="form-control" id="mailHost" value="{{ config('appsetting.email.mail_host') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mailPort" class="col-md-2 col-form-label">{{__('appsetting::labels.backend.appsetting.email_and_sms.mail_port')}}</label>
                    <div class="col-md-10">
                      <input type="text" readonly name="" class="form-control" id="mailPort" value="{{ config('appsetting.email.mail_port') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mailUsername" class="col-md-2 col-form-label">{{__('appsetting::labels.backend.appsetting.email_and_sms.mail_username')}}</label>
                    <div class="col-md-10">
                      <input type="text" readonly name="" class="form-control" id="mailUsername" value="{{ config('appsetting.email.mail_username') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mailPassword" class="col-md-2 col-form-label">{{__('appsetting::labels.backend.appsetting.email_and_sms.mail_password')}}</label>
                    <div class="col-md-10">
                      <input type="password" readonly name="" class="form-control" id="mailPassword" value="{{ config('appsetting.email.mail_password') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mailEncryption" class="col-md-2 col-form-label">{{__('appsetting::labels.backend.appsetting.email_and_sms.mail_encryption')}}</label>
                    <div class="col-md-10">
                      <input type="text" readonly name="" class="form-control" id="mailEncryption" value="{{ config('appsetting.email.mail_encryption') }}">
                    </div>
                </div>
            </div>

         <div class="card-footer">
             <div class="row">
                <div class="col text-left">
                    {{ form_cancel(route('admin.appsetting.index'),__('buttons.general.cancel')) }}
                </div><!--row-->
                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
             </div><!--row-->
         </div><!--card-footer-->
        </div><!--card-->
         {{ html()->closeModelForm() }}
         
     </div>
       
</div>