@extends ('backend.layouts.app')

@section ('title', __('slider::labels.backend.slider.management'))

@section('breadcrumb-links')
    @include('slider::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('slider::labels.backend.slider.management') }}
                    <small class="text-muted">{{ __('slider::labels.backend.slider.show') }}</small>
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
                    <strong>{{ __('slider::labels.backend.slider.table.created') }}:</strong> {{ $slider->updated_at->timezone(get_user_timezone()) }} ({{ $slider->created_at->diffForHumans() }}),
                    <strong>{{ __('slider::labels.backend.slider.table.last_updated') }}:</strong> {{ $slider->created_at->timezone(get_user_timezone()) }} ({{ $slider->updated_at->diffForHumans() }})
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