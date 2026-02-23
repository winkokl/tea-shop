@extends ('backend.layouts.app')

@section ('title', appName() . ' | ' . __('vendor::labels.backend.vendor.management'))

@section('breadcrumb-links')
    @include('vendor::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style("https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css") }}
    {{ style('assets/plugins/sweetalert2/sweetalert2.min.css') }}
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('vendor::labels.backend.vendor.management') }} <small class="text-muted">{{ __('vendor::labels.backend.vendor.list') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('vendor::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="vendor-table" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('vendor::labels.backend.vendor.table.id') }}</th>
                            <th>{{ __('vendor::labels.backend.vendor.table.name') }}</th>
                            <th>{{ __('vendor::labels.backend.vendor.table.mobile') }}</th>
                            <th>{{ __('vendor::labels.backend.vendor.table.code') }}</th>
                            <th>{{ __('vendor::labels.backend.vendor.table.region') }}</th>
                            <th>{{ __('vendor::labels.backend.vendor.table.township') }}</th>
                            <th>{{ __('vendor::labels.backend.vendor.table.last_updated') }}</th>
                            <th>{{ __('vendor::labels.backend.vendor.table.actions') }}</th>
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
    {{ script("https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js") }}
    <!-- {{ script("js/backend/plugin/datatables/dataTables-extend.js") }} -->
    {{ script('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#vendor-table').DataTable({
                serverSide: true,
                ajax: {
                    url: '{!! route($routeName) !!}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name',searchable: true, sortable: true},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'vendor_ref', name: 'code'},
                    {data: 'region', name: 'region.name'},
                    {data: 'township', name: 'township.name'},
                    {data: 'updated_at', name: 'updated_at'},
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