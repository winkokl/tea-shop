@extends ('backend.layouts.app')

@section ('title', __('customer::labels.backend.customer.management') . ' | ' . __('customer::labels.backend.customer.edit'))

@section('breadcrumb-links')
    @include('customer::includes.breadcrumb-links')
@endsection

@push('after-styles')
{{ style('assets/plugins/daterangepicker/daterangepicker.css') }}

@endpush

@section('content')
{{ html()->modelForm($customer, 'PATCH', route('admin.customer.update', $customer->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('customer::labels.backend.customer.management') }}
                        <small class="text-muted">{{ __('customer::labels.backend.customer.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('customer::labels.backend.customer.table.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-4">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('customer::labels.backend.customer.table.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('customer::labels.backend.customer.table.mobile_no').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('mobile_no') }}
    
                            <div class="col-md-4">
                                {{ html()->number('mobile_no')
                                    ->class('form-control')
                                    ->placeholder(__('customer::labels.backend.customer.table.mobile_no'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('customer::labels.backend.customer.table.price').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('price') }}
    
                            <div class="col-md-4">
                                {{ html()->number('price')
                                    ->class('form-control')
                                    ->placeholder(__('customer::labels.backend.customer.table.price'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('customer::labels.backend.customer.table.code').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('code') }}

                        <div class="col-md-4">
                            {{ html()->text('code')
                                ->class('form-control')
                                ->placeholder(__('customer::labels.backend.customer.table.code'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('customer::labels.backend.customer.table.start_date').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('start_date') }}

                        <div class="col-md-4">
                            {{ html()->text('start_date')
                                ->class('form-control')
                                ->placeholder(__('customer::labels.backend.customer.table.start_date'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('customer::labels.backend.customer.table.end_date').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('end_date') }}

                        <div class="col-md-4">
                            {{ html()->text('end_date')
                                ->class('form-control')
                                ->placeholder(__('customer::labels.backend.customer.table.end_date'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('customer::labels.backend.customer.table.active').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('active') }}
                        <div class="col-md-4">
                        <input type="hidden" id="active_no" name="active_no" value="1">
                            <label class="switch">
                                <input type="checkbox" id="active" name="active" value=""
                                @if($customer->active)
                                 checked
                                @endif
                                 >
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.customer.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection

@push('after-scripts')
{{ script("assets/plugins/daterangepicker/moment.min.js") }}
{{ script("assets/plugins/daterangepicker/daterangepicker.min.js") }}
<script>
    $(document).ready(function () {
        $('#active').on('click', function () {
            console.log('hi');
            if ($(this).is(':checked')) {
                $(this).attr('value', '1');
                $('#active_no').attr('value', '1');
            } else {
                $(this).attr('value', '0');
                $('#active_no').attr('value', '0');
            }
        });
    });


    $(function() {

        $('#start_date').daterangepicker({
            singleDatePicker: true,
            // startDate: moment().startOf('hour'),
            // endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
            format: 'YYYY-MM-DD'
            }
        });
        $('#end_date').daterangepicker({
            singleDatePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
            format: 'YYYY-MM-DD'
            }
        });

    });
</script>
@endpush