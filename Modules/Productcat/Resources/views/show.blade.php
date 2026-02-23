@extends ('backend.layouts.app')

@section ('title', __('productcat::labels.backend.productcat.management'))

@section('breadcrumb-links')
    @include('productcat::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('productcat::labels.backend.productcat.management') }}
                    <small class="text-muted">{{ __('productcat::labels.backend.productcat.show') }}</small>
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
                    <strong>{{ __('productcat::labels.backend.productcat.table.created') }}:</strong> {{ $productcat->updated_at->timezone(get_user_timezone()) }} ({{ $productcat->created_at->diffForHumans() }}),
                    <strong>{{ __('productcat::labels.backend.productcat.table.last_updated') }}:</strong> {{ $productcat->created_at->timezone(get_user_timezone()) }} ({{ $productcat->updated_at->diffForHumans() }})
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