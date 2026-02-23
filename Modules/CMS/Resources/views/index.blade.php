@extends ('backend.layouts.app')

@section ('title', appName() . ' | ' . __('cms::labels.backend.cms.management'))

@section('breadcrumb-links')
    @include('cms::includes.breadcrumb-links')
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
                    {{ __('cms::labels.backend.cms.management') }} <small class="text-muted">{{ __('cms::labels.backend.cms.list') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('cms::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="cms-table" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('cms::labels.backend.cms.table.id') }}</th>
                            <th>{{ __('cms::labels.backend.cms.table.name') }}</th>
                            <th>{{ __('cms::labels.backend.cms.table.actions') }}</th>
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
    {{ script('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#cms-table').DataTable({
                serverSide: true,
                ajax: {
                    url: '{!! route("admin.cms.get") !!}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title' , searchable: true},
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