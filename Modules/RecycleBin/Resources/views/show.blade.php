@extends ('backend.layouts.app')

@section ('title', __('recyclebin::labels.backend.recyclebin.management'))

@section('breadcrumb-links')
    @include('recyclebin::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('recyclebin::labels.backend.recyclebin.management') }}
                    <small class="text-muted">{{ __('recyclebin::labels.backend.recyclebin.show') }}</small>
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
                    <strong>{{ __('recyclebin::labels.backend.recyclebin.table.created') }}:</strong> {{ $recyclebin->updated_at->timezone(get_user_timezone()) }} ({{ $recyclebin->created_at->diffForHumans() }}),
                    <strong>{{ __('recyclebin::labels.backend.recyclebin.table.last_updated') }}:</strong> {{ $recyclebin->created_at->timezone(get_user_timezone()) }} ({{ $recyclebin->updated_at->diffForHumans() }})
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