@extends ('backend.layouts.app')

@section ('title', __('employee::labels.backend.employee.management') . ' | ' . __('employee::labels.backend.employee.edit'))

@section('breadcrumb-links')
    @include('employee::includes.breadcrumb-links')
@endsection

@push('after-styles')
{{ style('assets/plugins/daterangepicker/daterangepicker.css') }}
@endpush

@section('content')
{{ html()->modelForm($employee, 'PATCH', route('admin.employee.update', $employee))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('employee::labels.backend.employee.management') }}
                        <small class="text-muted">{{ __('employee::labels.backend.employee.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('employee::labels.backend.employee.table.user').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('user_id') }}

                        <div class="col-md-4">
                            <select name="user_id" class="form-control" required>
                                <option value="">{{ __('Select User') }}</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $employee->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
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

                    <div class="form-group row">
                    {{ html()->label(__('employee::labels.backend.employee.table.hire_date'))->class('col-md-2 form-control-label')->for('hire_date') }}

                        <div class="col-md-4">
                            {{ html()->text('hire_date')
                                ->class('form-control date-picker')
                                ->placeholder(__('employee::labels.backend.employee.table.hire_date'))
                                ->attribute('maxlength', 191)
                                ->value($employee->hire_date) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('employee::labels.backend.employee.table.salary'))->class('col-md-2 form-control-label')->for('salary') }}

                            <div class="col-md-4">
                                {{ html()->number('salary')
                                    ->class('form-control')
                                    ->placeholder(__('employee::labels.backend.employee.table.salary'))
                                    ->attribute('step', '0.01') }}
                            </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('employee::labels.backend.employee.table.active'))->class('col-md-2 form-control-label')->for('active') }}

                            <div class="col-md-4">
                                <select name="active" class="form-control">
                                    <option value="1" {{ $employee->active == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $employee->active == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
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
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
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
