@extends ('backend.layouts.app')

@section ('title', __('shoptable::labels.backend.shoptable.management') . ' | ' . __('shoptable::labels.backend.shoptable.edit'))

@section('breadcrumb-links')
    @include('shoptable::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
@endpush

@section('content')
{{ html()->modelForm($shoptable, 'PATCH', route('admin.shoptable.update', $shoptable->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('shoptable::labels.backend.shoptable.management') }}
                        <small class="text-muted">{{ __('shoptable::labels.backend.shoptable.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label('Shop')->class('col-md-2 form-control-label')->for('shop_id') }}

                        <div class="col-md-10">
                            <select name="shop_id" id="shop_id" class="form-control shop-select" required="required">
                                <option value=""></option>
                                @foreach ($shops as $shop)
                                    <option value="{{ $shop->id }}" {{ $shop->id == $shoptable->shop_id ? 'selected' : ''}}>{{ $shop->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Table Number')->class('col-md-2 form-control-label')->for('table_number') }}

                        <div class="col-md-10">
                            {{ html()->text('table_number')
                                ->class('form-control')
                                ->placeholder('e.g. T1, T2, A1')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Capacity')->class('col-md-2 form-control-label')->for('capacity') }}

                        <div class="col-md-10">
                            {{ html()->number('capacity')
                                ->class('form-control')
                                ->placeholder('Number of seats')
                                ->attribute('min', 1)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Status')->class('col-md-2 form-control-label')->for('status') }}

                        <div class="col-md-10">
                            <select name="status" id="status" class="form-control" required="required">
                                <option value="available" {{ $shoptable->status == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="occupied" {{ $shoptable->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                                <option value="reserved" {{ $shoptable->status == 'reserved' ? 'selected' : '' }}>Reserved</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.shoptable.index'), __('buttons.general.cancel')) }}
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
        $('.shop-select').select2({
            placeholder: "Choose Shop"
        });
    });
</script>
@endpush