@extends ('backend.layouts.app')

@section ('title', __('vendor::labels.backend.vendor.management'))

@section('breadcrumb-links')
    @include('vendor::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('vendor::labels.backend.vendor.management') }}
                    <small class="text-muted">{{ __('vendor::labels.backend.vendor.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                    <tr>
                       <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.name') }}</th>
                       <td>{{ $vendor->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.vendor_ref') }}</th>
                        <td>{{ $vendor->vendor_ref }}</td>
                     </tr>
                     <tr>
                        <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.email') }}</th>
                        <td>{{ $vendor->user->email }}</td>
                     </tr>
                    <tr>
                       <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.mobile') }}</th>
                       <td>{{ $vendor->mobile }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.nrc') }}</th>
                        <td>{{ $vendor->nrc }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.address') }}</th>
                        <td>{{ $vendor->address }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.opening_time') }}</th>
                        <td>{{ $vendor->opening_time }}</td>
                     </tr>
                     <tr>
                        <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.closing_time') }}</th>
                        <td>{{ $vendor->closing_time }}</td>
                     </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.region') }}</th>
                        <td>{{ $vendor->region->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.township') }}</th>
                        <td>{{ $vendor->township->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.latitude') }}</th>
                        <td>{{ $vendor->latitude }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.longitude') }}</th>
                        <td>{{ $vendor->longitude }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('vendor::labels.backend.vendor.table.delivery') }}</th>
                        <td>{!! ($vendor->delivery)?'<label class="badge badge-success" >YES</label>':'<label class="badge badge-danger" >NO</label>' !!}</td>
                    </tr>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('vendor::labels.backend.vendor.table.created') }}:</strong> {{ $vendor->updated_at->timezone(get_user_timezone()) }} ({{ $vendor->created_at->diffForHumans() }}),
                    <strong>{{ __('vendor::labels.backend.vendor.table.last_updated') }}:</strong> {{ $vendor->created_at->timezone(get_user_timezone()) }} ({{ $vendor->updated_at->diffForHumans() }})
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection

@push('after-scripts')

<script>


</script>
@endpush