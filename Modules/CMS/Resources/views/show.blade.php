@extends ('backend.layouts.app')

@section ('title', __('cms::labels.backend.cms.management'))

@section('breadcrumb-links')
    @include('cms::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('cms::labels.backend.cms.management') }}
                    <small class="text-muted">{{ __('cms::labels.backend.cms.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                     <tr>
                        <th>{{ __('cms::labels.backend.cms.table.title') }}</th>
                        <th>{{ __('cms::labels.backend.cms.table.description') }}</th>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('cms::labels.backend.cms.table.title') }}</th>
                        <td>{{ $cms->title }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('cms::labels.backend.cms.table.content') }}</th>
                        <td>{!! $cms->content !!}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('cms::labels.backend.cms.table.mm_title') }}</th>
                        <td>{{ $cms->mm_title }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('cms::labels.backend.cms.table.mm_content') }}</th>
                        <td>{!! $cms->mm_content !!}</td>
                    </tr>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('cms::labels.backend.cms.table.created') }}:</strong> {{ $cms->updated_at->timezone(get_user_timezone()) }} ({{ $cms->created_at->diffForHumans() }}),
                    <strong>{{ __('cms::labels.backend.cms.table.last_updated') }}:</strong> {{ $cms->created_at->timezone(get_user_timezone()) }} ({{ $cms->updated_at->diffForHumans() }})
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