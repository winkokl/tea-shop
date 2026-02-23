@extends ('backend.layouts.app')

@section ('title', appName() . ' | ' . __('city::labels.backend.city.management'))

@section('breadcrumb-links')
    @include('city::includes.breadcrumb-links')
@endsection

@push('after-styles')
    <!-- {{ style("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css") }} -->
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
                    {{ __('city::labels.backend.city.management') }} <small class="text-muted">{{ __('city::labels.backend.city.list') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('city::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="city-table" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('city::labels.backend.city.table.id') }}</th>
                            <th>{{ __('city::labels.backend.city.table.name') }}</th>
                            <th>{{ __('city::labels.backend.city.table.status') }}</th>
                            <th>{{ __('city::labels.backend.city.table.last_updated') }}</th>
                            <th>{{ __('city::labels.backend.city.table.actions') }}</th>
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
            $('#city-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv'
                ],
                serverSide: true,
                responsive: true,
                ajax: {
                    url: '{!! route("admin.city.get") !!}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name', searchable:true},
                    {data: 'status', name: 'status'},
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