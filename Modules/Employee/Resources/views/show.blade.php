@extends ('backend.layouts.app')

@section ('title', __('employee::labels.backend.employee.management') . ' | ' . __('employee::labels.backend.employee.view'))

@section('breadcrumb-links')
    @include('employee::includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('employee::labels.backend.employee.management') }}
                    <small class="text-muted">{{ __('employee::labels.backend.employee.view') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                    @can('admin.access.employee.edit')
                    <a href="{{ route('admin.employee.edit', $employee) }}" class="btn btn-primary ml-1" data-toggle="tooltip" title="{{ __('buttons.general.crud.edit') }}"><i class="fas fa-edit"></i></a>
                    @endcan
                    <a href="{{ route('admin.employee.index') }}" class="btn btn-secondary ml-1" data-toggle="tooltip" title="{{ __('buttons.general.back') }}"><i class="fas fa-arrow-left"></i></a>
                </div>
            </div><!--col-->
        </div><!--row-->

        <hr />

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>{{ __('employee::labels.backend.employee.table.user') }}</th>
                            <td>{{ $employee->user ? $employee->user->name : 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('employee::labels.backend.employee.table.employee_code') }}</th>
                            <td>{{ $employee->employee_code }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('employee::labels.backend.employee.table.position') }}</th>
                            <td>{{ $employee->position ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('employee::labels.backend.employee.table.department') }}</th>
                            <td>{{ $employee->department ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('employee::labels.backend.employee.table.hire_date') }}</th>
                            <td>{{ $employee->hire_date ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('employee::labels.backend.employee.table.salary') }}</th>
                            <td>{{ $employee->salary ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('employee::labels.backend.employee.table.active') }}</th>
                            <td>{!! $employee->active ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inactive</label>' !!}</td>
                        </tr>

                        <tr>
                            <th>{{ __('employee::labels.backend.employee.table.created_at') }}</th>
                            <td>{{ $employee->created_at }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('employee::labels.backend.employee.table.last_updated') }}</th>
                            <td>{{ $employee->updated_at }}</td>
                        </tr>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
