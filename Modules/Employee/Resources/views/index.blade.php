@extends ('backend.layouts.app')

@section ('title', appName() . ' | ' . __('employee::labels.backend.employee.management'))

@section('breadcrumb-links')
    @include('employee::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style("https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css") }}
    {{ style('assets/plugins/sweetalert2/sweetalert2.min.css') }}
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('employee::labels.backend.employee.management') }} <small class="text-muted">{{ __('employee::labels.backend.employee.list') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('employee::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="employee-table" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('employee::labels.backend.employee.table.name') }}</th>
                            <th>{{ __('employee::labels.backend.employee.table.employee_code') }}</th>
                            <th>{{ __('employee::labels.backend.employee.table.position') }}</th>
                            <th>{{ __('employee::labels.backend.employee.table.department') }}</th>
                            <!-- <th>{{ __('employee::labels.backend.employee.table.hire_date') }}</th> -->
                            <th>{{ __('employee::labels.backend.employee.table.status') }}</th>
                            <th>{{ __('employee::labels.backend.employee.table.last_updated') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
    {{ script("js/backend/plugin/datatables/dataTables.min.js") }}
    {{ script("js/backend/plugin/datatables/dataTables.bootstrap4.min.js") }}
    {{ script('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#employee-table').DataTable({
                serverSide: true,
                ajax: {
                    url: '{!! route("admin.employee.get") !!}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'name', name: 'users.name'},
                    {data: 'employee_code', name: 'employees.employee_code'},
                    {data: 'position', name: 'employees.position'},
                    {data: 'department', name: 'employees.department'},
                    {data: 'status', name: 'status', searchable: false, sortable: false},
                    {data: 'updated_at', name: 'employees.updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                fnDrawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    load_plugins();
                }
            });
        });
    </script>
@endpush
