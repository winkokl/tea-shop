@extends ('backend.layouts.app')

@section ('title', __('township::labels.backend.township.management') . ' | ' . __('township::labels.backend.township.edit'))

@section('breadcrumb-links')
    @include('township::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
{{ html()->modelForm($township, 'PATCH', route('admin.township.update', $township->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('township::labels.backend.township.management') }}
                        <small class="text-muted">{{ __('township::labels.backend.township.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

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
                                @if($township->active)
                                    {{ html()->checkbox('active', true)->class('switch-input') }}
                                @else
                                    {{ html()->checkbox('active', false)->class('switch-input') }}
                                @endif
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
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection

@push('after-scripts')

<script>


</script>
@endpush