@extends ('backend.layouts.app')

@section ('title', __('cms::labels.backend.cms.management') . ' | ' . __('cms::labels.backend.cms.create'))

@section('breadcrumb-links')
    @include('cms::includes.breadcrumb-links')
@endsection

@push('after-styles')
    @include('cms::includes.link')
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous" defer></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous" defer></script> -->
@endpush

@section('content')
{{ html()->form('POST', route('admin.cms.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('cms::labels.backend.cms.management') }}
                        <small class="text-muted">{{ __('cms::labels.backend.cms.create') }}</small>
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
                                ->attribute('maxlength', 191)
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
                    {{ form_submit(__('buttons.general.crud.create')) }}
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