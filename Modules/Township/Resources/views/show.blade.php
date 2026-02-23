@extends ('backend.layouts.app')

@section ('title', __('township::labels.backend.township.management'))

@section('breadcrumb-links')
    @include('township::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('township::labels.backend.township.management') }}
                    <small class="text-muted">{{ __('township::labels.backend.township.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                     <tr>
                        <th>{{ __('township::labels.backend.township.table.title')}}</th>
                        <th>{{ __('township::labels.backend.township.table.description')}}</th>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('township::labels.backend.township.table.region_name')}}</th>
                        <td>{{ $township->region->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('township::labels.backend.township.table.township_name')}}</th>
                        <td>{{ $township->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('township::labels.backend.township.table.mm_township_name')}}</th>
                        <td>{{ $township->mm_name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('township::labels.backend.township.table.status')}}</th>
                        <td>{!! $township->active == 1 ? 'Acitve' : 'Inactive' !!}</td>
                    </tr>
                    
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('township::labels.backend.township.table.created') }}:</strong> {{ $township->updated_at->timezone(get_user_timezone()) }} ({{ $township->created_at->diffForHumans() }}),
                    <strong>{{ __('township::labels.backend.township.table.last_updated') }}:</strong> {{ $township->created_at->timezone(get_user_timezone()) }} ({{ $township->updated_at->diffForHumans() }})
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