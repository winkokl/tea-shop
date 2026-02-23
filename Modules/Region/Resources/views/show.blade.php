@extends ('backend.layouts.app')

@section ('title', __('region::labels.backend.region.management'))

@section('breadcrumb-links')
    @include('region::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('region::labels.backend.region.management') }}
                    <small class="text-muted">{{ __('region::labels.backend.region.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                     <tr>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td>{{ __('region::labels.backend.region.table.name') }}</td>
                        <td>{{ $region->name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('region::labels.backend.region.table.mm_name') }}</td>
                        <td>{{ $region->mm_name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('region::labels.backend.region.table.status') }}</td>
                        <td>{!! $region->active == 1 ? 'Acitve' : 'Inactive' !!}</td>
                    </tr>
                    
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('region::labels.backend.region.table.created') }}:</strong> {{ $region->updated_at->timezone(get_user_timezone()) }} ({{ $region->created_at->diffForHumans() }}),
                    <strong>{{ __('region::labels.backend.region.table.last_updated') }}:</strong> {{ $region->created_at->timezone(get_user_timezone()) }} ({{ $region->updated_at->diffForHumans() }})
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