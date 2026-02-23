@extends ('backend.layouts.app')

@section ('title', __('appsetting::labels.backend.appsetting.management'))

@section('breadcrumb-links')
    @include('appsetting::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('appsetting::labels.backend.appsetting.management') }}
                    <small class="text-muted">{{ __('appsetting::labels.backend.appsetting.show') }}</small>
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
                    <strong>{{ __('appsetting::labels.backend.appsetting.table.created') }}:</strong> {{ $appsetting->updated_at->timezone(get_user_timezone()) }} ({{ $appsetting->created_at->diffForHumans() }}),
                    <strong>{{ __('appsetting::labels.backend.appsetting.table.last_updated') }}:</strong> {{ $appsetting->created_at->timezone(get_user_timezone()) }} ({{ $appsetting->updated_at->diffForHumans() }})
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