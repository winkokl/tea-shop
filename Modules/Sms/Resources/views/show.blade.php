@extends ('backend.layouts.app')

@section ('title', __('sms::labels.backend.sms.management'))

@section('breadcrumb-links')
    @include('sms::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('sms::labels.backend.sms.management') }}
                    <small class="text-muted">{{ __('sms::labels.backend.sms.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>{{ __('sms::labels.backend.sms.table.slug') }}</td>
                      <td>{{ $sms->slug }}</td>
                    </tr>
                    <tr>
                      <td>{{ __('sms::labels.backend.sms.table.content') }}</td>
                      <td>{{ strip_tags($sms->content) }}</td>
                    </tr>
                    <tr>
                      <td>{{ __('sms::labels.backend.sms.table.mm_content') }}</td>
                      <td>{{ strip_tags($sms->mm_content) }}</td>
                    </tr>
                  </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('sms::labels.backend.sms.table.created') }}:</strong> {{ $sms->updated_at->timezone(get_user_timezone()) }} ({{ $sms->created_at->diffForHumans() }}),
                    <strong>{{ __('sms::labels.backend.sms.table.last_updated') }}:</strong> {{ $sms->created_at->timezone(get_user_timezone()) }} ({{ $sms->updated_at->diffForHumans() }})
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