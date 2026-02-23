@extends ('backend.layouts.app')

@section ('title', __('township::labels.backend.township.management') . ' | ' . __('township::labels.backend.township.create'))

@section('breadcrumb-links')
    @include('township::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
@endpush

@section('content')
{{ html()->form('POST', route('admin.township.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('township::labels.backend.township.management') }}
                        <small class="text-muted">{{ __('township::labels.backend.township.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('township::labels.backend.township.table.region_name'))->class('col-md-2 form-control-label')->for('region_name') }}

                        <div class="col-md-10">
                            <select name="region_id" id="region" class="form-control region-name" required="required">
                                <option></option>
                                @foreach ($regions as $key => $region)
                                    <option value="{{ $region->id }}" name="region_id" {{ $region == old('region') ? ' selected' : ''}}>{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('township::labels.backend.township.table.township_name'))->class('col-md-2 form-control-label')->for('township_name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('township::labels.backend.township.table.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('township::labels.backend.township.table.mm_township_name'))->class('col-md-2 form-control-label')->for('mm_township_name') }}

                        <div class="col-md-10">
                            {{ html()->text('mm_name')
                                ->class('form-control')
                                ->placeholder(__('township::labels.backend.township.table.mm_name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('township::labels.backend.township.table.active'))->class('col-md-2 form-control-label')->for('active') }}

                        <div class="col-md-10">
                            <label class="switch switch-3d switch-primary">
                                {{ html()->checkbox('active', true)->class('switch-input') }}
                                <span class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.township.index'), __('buttons.general.cancel')) }}
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
        $('.region-name').select2({
            placeholder: "Choose Region"
        });
    });

</script>
@endpush