@extends ('backend.layouts.app')

@section ('title', __('slider::labels.backend.slider.management') . ' | ' . __('slider::labels.backend.slider.create'))

@section('breadcrumb-links')
    @include('slider::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
@endpush

@section('content')
{{ html()->form('POST', route('admin.slider.store'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('slider::labels.backend.slider.management') }}
                        <small class="text-muted">{{ __('slider::labels.backend.slider.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('slider::labels.backend.slider.table.type').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('type') }}

                        <div class="col-md-10">
                            <select name="type" id="type" class="form-control select2" required="required">
                                <option></option>
                                @foreach ($sliderType as $id => $name)
                                    <option value="{{ $id }}" name="type">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('slider::labels.backend.slider.table.name').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('slider::labels.backend.slider.table.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('slider::labels.backend.slider.table.photo').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('photo') }}
                        <div class="col-md-10">
                            <input type="file" name="photo" class="form-control-file">
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('slider::labels.backend.slider.table.description'))->class('col-md-2 form-control-label')->for('description') }}

                        <div class="col-md-10">
                            {{ html()->textarea('description')
                                ->class('form-control')
                                ->placeholder(__('slider::labels.backend.slider.table.description'))}}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('slider::labels.backend.slider.table.link').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('link') }}
    
                        <div class="col-md-10">
                            {{ html()->text('link')
                                ->class('form-control')
                                ->placeholder(__('slider::labels.backend.slider.table.link'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('slider::labels.backend.slider.table.status').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('active') }}
                        <div class="col-md-10">
                            <label class="switch">
                                <input type="checkbox" id="active" name="active" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.slider.index'), __('buttons.general.cancel')) }}
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
    {{ script('assets/plugins/select2/js/select2.full.min.js')}}
    {{ script("assets/plugins/select2/component/components-select2.js") }}
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Choose Slider Type"
        });
    });

</script>
@endpush