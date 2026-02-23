@extends ('backend.layouts.app')

@section ('title', __('shop::labels.backend.shop.management') . ' | ' . __('shop::labels.backend.shop.edit'))

@section('breadcrumb-links')
    @include('shop::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
@endpush

@section('content')
{{ html()->modelForm($shop, 'PATCH', route('admin.shop.update', $shop->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('shop::labels.backend.shop.management') }}
                        <small class="text-muted">{{ __('shop::labels.backend.shop.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('shop::labels.backend.shop.table.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('shop::labels.backend.shop.table.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Township')->class('col-md-2 form-control-label')->for('township_id') }}

                        <div class="col-md-10">
                            <select name="township_id" id="township_id" class="form-control township-select" required="required">
                                <option value=""></option>
                                @foreach ($townships as $township)
                                    <option value="{{ $township->id }}" {{ $shop->township_id == $township->id ? 'selected' : ''}}>{{ $township->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label('Status')->class('col-md-2 form-control-label')->for('status') }}

                        <div class="col-md-10">
                            <label class="switch switch-3d switch-primary">
                                @if($shop->status)
                                    {{ html()->checkbox('status', true)->class('switch-input') }}
                                @else
                                    {{ html()->checkbox('status', false)->class('switch-input') }}
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
                    {{ form_cancel(route('admin.shop.index'), __('buttons.general.cancel')) }}
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
    {{ script('assets/plugins/select2/js/select2.full.min.js')}}
    {{ script("assets/plugins/select2/component/components-select2.js") }}

<script>
    $(document).ready(function() {
        $('.township-select').select2({
            placeholder: "Choose Township"
        });
    });
</script>
@endpush