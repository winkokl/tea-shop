@extends ('backend.layouts.app')

@section ('title', __('city::labels.backend.city.management'))

@section('breadcrumb-links')
    @include('city::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('city::labels.backend.city.management') }}
                    <small class="text-muted">{{ __('city::labels.backend.city.show') }}</small>
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
                        <th style="width: 20%;">{{ __('city::labels.backend.city.table.name') }}</th>
                        <td>{{ $city->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('city::labels.backend.city.table.status') }}</th>
                        <td>{!! $city->active == 1 ? 'Acitve' : 'Inactive' !!}</td>
                    </tr>
                    
                </table>
                 
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('city::labels.backend.city.table.created') }}:</strong> {{ $city->updated_at->timezone(get_user_timezone()) }} ({{ $city->created_at->diffForHumans() }}),
                    <strong>{{ __('city::labels.backend.city.table.last_updated') }}:</strong> {{ $city->created_at->timezone(get_user_timezone()) }} ({{ $city->updated_at->diffForHumans() }})
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