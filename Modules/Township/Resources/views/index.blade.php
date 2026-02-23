@extends ('backend.layouts.app')

@section ('title', appName() . ' | ' . __('township::labels.backend.township.management'))

@section('breadcrumb-links')
    @include('township::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style("https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css") }}
    {{ style("https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css") }}
    {{ style('assets/plugins/sweetalert2/sweetalert2.min.css') }}
    {{ style('https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css') }}
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('township::labels.backend.township.management') }} <small class="text-muted">{{ __('township::labels.backend.township.list') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('township::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="township-table" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('township::labels.backend.township.table.id') }}</th>
                            <th>{{ __('township::labels.backend.township.table.name') }}</th>
                            <th>{{ __('township::labels.backend.township.table.mm_name') }}</th>
                            <th>{{ __('township::labels.backend.township.table.status') }}</th>
                            <th>{{ __('township::labels.backend.township.table.last_updated') }}</th>
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
    {{ script("https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js") }}
    {{ script("https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js") }}
    {{ script("https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js") }}
    {{ script('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}
    {{ script('https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js')}}
    {{ script('https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js')}}

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#township-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    'csv'
                ],
                serverSide: true,
                ajax: {
                    url: '{!! route("admin.township.get") !!}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name', searchable: true, sortable: true},
                    {data: 'mm_name', name: 'mm_name', searchable: true, sortable: true},
                    {data: 'status', name: 'status'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                fnDrawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    load_plugins();                }
            });
        });
    </script>
@endpush