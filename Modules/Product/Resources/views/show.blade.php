@extends ('backend.layouts.app')

@section ('title', __('product::labels.backend.product.management'))

@section('breadcrumb-links')
    @include('product::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('product::labels.backend.product.management') }}
                    <small class="text-muted">{{ __('product::labels.backend.product.show') }}</small>
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
                    <strong>{{ __('product::labels.backend.product.table.created') }}:</strong> {{ $product->updated_at->timezone(get_user_timezone()) }} ({{ $product->created_at->diffForHumans() }}),
                    <strong>{{ __('product::labels.backend.product.table.last_updated') }}:</strong> {{ $product->created_at->timezone(get_user_timezone()) }} ({{ $product->updated_at->diffForHumans() }})
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