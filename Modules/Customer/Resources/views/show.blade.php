@extends ('backend.layouts.app')

@section ('title', __('customer::labels.backend.customer.management'))

@section('breadcrumb-links')
    @include('customer::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('customer::labels.backend.customer.management') }}
                    <small class="text-muted">{{ __('customer::labels.backend.customer.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                    <tr>
                       <th style="width: 20%;">{{ __('customer::labels.backend.customer.table.name') }}</th>
                       <td>{{ $customer->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('customer::labels.backend.customer.table.mobile_no') }}</th>
                        <td>{{ $customer->mobile_no }}</td>
                     </tr>
                     <tr>
                        <th style="width: 20%;">{{ __('customer::labels.backend.customer.table.code') }}</th>
                        <td>{{ $customer->code }}</td>
                     </tr>
                    <tr>
                       <th style="width: 20%;">{{ __('customer::labels.backend.customer.table.price') }}</th>
                       <td>{{ $customer->price }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('customer::labels.backend.customer.table.start_date') }}</th>
                        <td>{{ $customer->start_date }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('customer::labels.backend.customer.table.end_date') }}</th>
                        <td>{{ $customer->end_date }}</td>
                    </tr>
                    
                    <tr>
                        <th style="width: 20%;">{{ __('customer::labels.backend.customer.table.active') }}</th>
                        <td>{!! ($customer->active)?'<label class="badge badge-success" >YES</label>':'<label class="badge badge-danger" >NO</label>' !!}</td>
                    </tr>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('customer::labels.backend.customer.table.created') }}:</strong> {{ $customer->updated_at->timezone(get_user_timezone()) }} ({{ $customer->created_at->diffForHumans() }}),
                    <strong>{{ __('customer::labels.backend.customer.table.last_updated') }}:</strong> {{ $customer->created_at->timezone(get_user_timezone()) }} ({{ $customer->updated_at->diffForHumans() }})
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