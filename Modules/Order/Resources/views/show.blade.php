@extends ('backend.layouts.app')

@section ('title', __('order::labels.backend.order.management'))

@section('breadcrumb-links')
    @include('order::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('order::labels.backend.order.management') }}
                    <small class="text-muted">{{ __('order::labels.backend.order.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('order::labels.backend.order.table.created') }}:</strong> {{ $order->updated_at->timezone(get_user_timezone()) }} ({{ $order->created_at->diffForHumans() }}),
                    <strong>{{ __('order::labels.backend.order.table.last_updated') }}:</strong> {{ $order->created_at->timezone(get_user_timezone()) }} ({{ $order->updated_at->diffForHumans() }})
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