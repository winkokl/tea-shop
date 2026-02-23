@extends ('backend.layouts.app')

@section ('title', appName() . ' | ' . __('appsetting::labels.backend.appsetting.management'))

@section('breadcrumb-links')
    @include('appsetting::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style("https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css") }}
    {{ style("https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css") }}
    {{ style('assets/plugins/sweetalert2/sweetalert2.min.css') }}
    <style type="text/css">
        .form-group{
            margin: 30px 5px;
        }
        .breadcrumb-item{
            margin-top: 10px;
        }
    </style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('appsetting::labels.backend.appsetting.management') }} <small class="text-muted">{{ __('appsetting::labels.backend.appsetting.list') }}</small>
                </h4>
            </div><!--col-->

        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#basicSetting" role="tab" aria-controls="basicSetting" aria-selected="true">{{ __('appsetting::labels.backend.appsetting.basic.basic') }}</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">{{ __('appsetting::labels.backend.appsetting.payment') }}</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="email-sms-tab" data-bs-toggle="tab" data-bs-target="#emailAndSms" type="button" role="tab" aria-controls="emailAndSms" aria-selected="false">{{ __('appsetting::labels.backend.appsetting.email_and_sms.email_sms') }}</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                   <div class="tab-pane show active" id="basicSetting" role="tabpanel" aria-labelledby="home-tab">
                        {{ html()->form('POST', route('admin.appsetting.store'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
                        {!! html()->hidden('tab','basic') !!}

                            <div class="form-group row {{ $errors->has('main_logo') ? ' has-error' : '' }}">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.main_logo'))->class('col-md-3 form-control-label')->for('main_logo') }}
                             
                                <div class="col-md-9">
                                    <input type="file" value="{{ config('appsetting.basic.main_logo') }}" id="main_logo" name="main_logo" class="form-control"><br>
                                    @if(config('appsetting.basic.main_logo'))
                                        <img src="{{ config('appsetting.basic.main_logo') }}" class="thumbnail"  style="width: 200px; height: 150px;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.app_name'))->class('col-md-3 form-control-label')->for('app_name') }}
                                <div class="col-md-9">
                                    {{ html()->text('app_name')->value(config('appsetting.basic.app_name'))->class('form-control')->id('app_name') }}
                                </div>
                            </div>
                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.app_email'))->class('col-md-3 form-control-label')->for('app_email') }}
                                <div class="col-md-9">
                                    {{ html()->text('app_email')->value(config('appsetting.basic.email'))->class('form-control')->id('app_email') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.fb_link'))->class('col-md-3 form-control-label')->for('fb_link') }}
                                <div class="col-md-9">
                                    {{ html()->text('fb_link')->value(config('appsetting.basic.facebook_link'))->class('form-control')->id('fb_link') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.phone_number'))->class('col-md-3 form-control-label')->for('phone_number') }}
                                <div class="col-md-9">
                                    {{ html()->text('app_phone')->value(config('appsetting.basic.phone'))->class('form-control')->id('app_phone') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.address'))->class('col-md-3 form-control-label')->for('address') }}
                                <div class="col-md-9">
                                    {{ html()->textarea('app_address')->value(config('appsetting.basic.address'))->class('form-control')->id('app_address') }}
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.google_map_key'))->class('col-md-3 form-control-label')->for('google_map_key') }}
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="google_map" id="" placeholder="" value="{{ config('appsetting.basic.map_key') }}" disabled="true">
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.meta_keywords'))->class('col-md-3 form-control-label')->for('meta_keywords') }}
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="meta_keywords" id="" placeholder="" value="{{ config('app.meta_keywords') }}">
                                </div>
                            </div>

                            <div class="form-group row form-md-line-input">
                                {{ html()->label(__('appsetting::labels.backend.appsetting.basic.meta_description'))->class('col-md-3 form-control-label')->for('meta_description') }}
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="meta_description" id="" placeholder="" value="{{ config('app.meta_description') }}">
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col text-right">
                                       {{ form_submit(__('buttons.general.crud.update')) }}
                                    </div><!--row-->
                                </div><!--row-->
                            </div><!--card-footer-->

                       {{ html()->closeModelForm() }}
                   </div>

                   <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                        {{ html()->form('POST',route('admin.appsetting.store'))->class('form-horizontal')->open() }} 
                        {!! html()->hidden('tab','payment') !!}

                        <div class="accordion mt-4" id="accordionPayment">
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingOne">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    2C2P
                                  </button>
                                </h2>
                                @include('appsetting::includes.payments.2C2P')
                            </div>

                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    KBZ
                                    </button>
                                </h2>
                                @include('appsetting::includes.payments.kbz') 
                            </div>

                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Cash on delivery
                                    </button>
                                </h2>
                                @include('appsetting::includes.payments.cod') 
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col text-right">
                                        {{ form_submit(__('buttons.general.crud.update')) }}
                                    </div><!--row-->
                                </div><!--row-->
                            </div><!--card-footer-->
                            {{ html()->closeModelForm() }}
                            
                        </div>
                          
                   </div>

                   @include('appsetting::includes.email-and-sms')

                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
    {{ script("https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js") }}
    {{ script("https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js") }}
    <!-- {{ script("js/backend/plugin/datatables/dataTables-extend.js") }} -->
    {{ script('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#appsetting-table').DataTable({
                serverSide: true,
                ajax: {
                    url: '{!! route("admin.appsetting.get") !!}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                fnDrawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    //load_plugins();
                }
            });
        });
    </script>
@endpush