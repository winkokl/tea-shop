@extends ('backend.layouts.app')

@section ('title', __('sms::labels.backend.sms.management') . ' | ' . __('sms::labels.backend.sms.edit'))

@section('breadcrumb-links')
    @include('sms::includes.breadcrumb-links')
@endsection

@push('after-styles')
    @include('sms::includes.link')
@endpush

@section('content')
{{ html()->modelForm($sms, 'PATCH', route('admin.sms.update', $sms->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('sms::labels.backend.sms.management') }}
                        <small class="text-muted">{{ __('sms::labels.backend.sms.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('sms::labels.backend.sms.table.slug'))->class('col-md-2 form-control-label')->for('slug') }}

                        <div class="col-md-10">
                            {{ html()->text('slug')
                                ->class('form-control')
                                ->placeholder(__('sms::labels.backend.sms.table.slug'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('sms::labels.backend.sms.table.content'))->class('col-md-2 form-control-label')->for('content') }}

                        <div class="col-md-10">
                            {{ html()->textarea('content')
                                ->class('form-control summernote')
                                ->placeholder(__('sms::labels.backend.sms.table.content'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('sms::labels.backend.sms.table.mm_content'))->class('col-md-2 form-control-label')->for('mm_content') }}

                        <div class="col-md-10">
                            {{ html()->textarea('mm_content')
                                ->class('form-control summernote')
                                ->placeholder(__('sms::labels.backend.sms.table.mm_content'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.sms.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection

@push('after-scripts')

<script>

    $(document).ready(function(){
        $('.summernote').summernote({
            height :100
        });
    });

</script>
@endpush