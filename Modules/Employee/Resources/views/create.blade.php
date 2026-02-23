@extends ('backend.layouts.app')

@section ('title', __('employee::labels.backend.employee.management') . ' | ' . __('employee::labels.backend.employee.create'))

@section('breadcrumb-links')
    @include('employee::includes.breadcrumb-links')
@endsection

@push('after-styles')
{{ style('assets/plugins/daterangepicker/daterangepicker.css') }}
@endpush

@section('content')
{{ html()->form('POST', route('admin.employee.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('employee::labels.backend.employee.management') }}
                        <small class="text-muted">{{ __('employee::labels.backend.employee.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('employee::labels.backend.employee.table.name').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-4">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('employee::labels.backend.employee.table.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('employee::labels.backend.employee.table.employee_code').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('employee_code') }}

                        <div class="col-md-4">
                            {{ html()->text('employee_code')
                                ->class('form-control')
                                ->placeholder(__('employee::labels.backend.employee.table.employee_code'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('employee::labels.backend.employee.table.position'))->class('col-md-2 form-control-label')->for('position') }}

                            <div class="col-md-4">
                                {{ html()->text('position')
                                    ->class('form-control')
                                    ->placeholder(__('employee::labels.backend.employee.table.position'))
                                    ->attribute('maxlength', 191) }}
                            </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('employee::labels.backend.employee.table.department'))->class('col-md-2 form-control-label')->for('department') }}

                            <div class="col-md-4">
                                {{ html()->text('department')
                                    ->class('form-control')
                                    ->placeholder(__('employee::labels.backend.employee.table.department'))
                                    ->attribute('maxlength', 191) }}
                            </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.employee.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection

@push('after-scripts')
{{ script('assets/plugins/daterangepicker/moment.min.js') }}
{{ script('assets/plugins/daterangepicker/daterangepicker.js') }}
<script>
    $(function() {
        $('.date-picker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });

        $('.date-picker').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
        });
    });
</script>
@endpush
