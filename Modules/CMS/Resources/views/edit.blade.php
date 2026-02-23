@extends ('backend.layouts.app')

@section ('title', __('cms::labels.backend.cms.management') . ' | ' . __('cms::labels.backend.cms.edit'))

@section('breadcrumb-links')
    @include('cms::includes.breadcrumb-links')
@endsection

@push('after-styles')
    @include('cms::includes.link')
@endpush

@section('content')
{{ html()->modelForm($cms, 'PATCH', route('admin.cms.update', $cms->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('cms::labels.backend.cms.management') }}
                        <small class="text-muted">{{ __('cms::labels.backend.cms.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                    {{ html()->label(__('cms::labels.backend.cms.table.meta_tags'))->class('col-md-2 form-control-label')->for('meta_tags') }}

                        <div class="col-md-10">
                            {{ html()->text('meta_tags')
                                ->class('form-control')
                                ->placeholder(__('cms::labels.backend.cms.table.meta_tags'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                    {{ html()->label(__('cms::labels.backend.cms.table.meta_keywords'))->class('col-md-2 form-control-label')->for('meta_keywords') }}

                        <div class="col-md-10">
                            {{ html()->text('meta_keywords')
                                ->class('form-control')
                                ->placeholder(__('cms::labels.backend.cms.table.meta_keywords'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('cms::labels.backend.cms.table.page'))->class('col-md-2 form-control-label')->for('page') }}

                        <div class="col-md-10">
                            {{ html()->text('page')
                                ->class('form-control')
                                ->placeholder(__('cms::labels.backend.cms.table.page'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('cms::labels.backend.cms.table.title'))->class('col-md-2 form-control-label')->for('title') }}

                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder(__('cms::labels.backend.cms.table.title'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('cms::labels.backend.cms.table.content'))->class('col-md-2 form-control-label')->for('content') }}

                        <div class="col-md-10">
                            {{ html()->textarea('content')
                                ->class('form-control summernote')
                                ->placeholder(__('cms::labels.backend.cms.table.content'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('cms::labels.backend.cms.table.mm_title'))->class('col-md-2 form-control-label')->for('mm_title') }}

                        <div class="col-md-10">
                            {{ html()->text('mm_title')
                                ->class('form-control')
                                ->placeholder(__('cms::labels.backend.cms.table.mm_title'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('cms::labels.backend.cms.table.mm_content'))->class('col-md-2 form-control-label')->for('mm_content') }}

                        <div class="col-md-10">
                            {{ html()->textarea('mm_content')
                                ->class('form-control summernote')
                                ->placeholder(__('cms::labels.backend.cms.table.mm_content'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.cms.index'), __('buttons.general.cancel')) }}
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
            height : 300
        });
    });

</script>
@endpush