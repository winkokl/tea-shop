@extends ('backend.layouts.app')

@section ('title', __('product::labels.backend.product.management') . ' | ' . __('product::labels.backend.product.edit'))

@section('breadcrumb-links')
    @include('product::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
@endpush

@section('content')
{{ html()->modelForm($product, 'PATCH', route('admin.product.update', $product->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('product::labels.backend.product.management') }}
                        <small class="text-muted">{{ __('product::labels.backend.product.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label('Product Name')->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder('Product Name')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Shop')->class('col-md-2 form-control-label')->for('shop_id') }}

                        <div class="col-md-10">
                            <select name="shop_id" id="shop_id" class="form-control shop-select" required="required">
                                <option value=""></option>
                                @foreach ($shops as $shop)
                                    <option value="{{ $shop->id }}" {{ $product->shop_id == $shop->id ? 'selected' : ''}}>{{ $shop->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Category')->class('col-md-2 form-control-label')->for('category_id') }}

                        <div class="col-md-10">
                            <select name="category_id" id="category_id" class="form-control category-select" required="required">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label('Description')->class('col-md-2 form-control-label')->for('description') }}

                        <div class="col-md-10">
                            {{ html()->textarea('description')
                                ->class('form-control')
                                ->placeholder('Product Description')
                                ->rows(3) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label('Original Price')->class('col-md-2 form-control-label')->for('org_price') }}

                        <div class="col-md-10">
                            {{ html()->number('org_price')
                                ->class('form-control')
                                ->placeholder('Original Price')
                                ->attribute('step', '0.01')
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label('Promo Price')->class('col-md-2 form-control-label')->for('promo_price') }}

                        <div class="col-md-10">
                            {{ html()->number('promo_price')
                                ->class('form-control')
                                ->placeholder('Promo Price')
                                ->attribute('step', '0.01')
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label('Cost')->class('col-md-2 form-control-label')->for('cost') }}

                        <div class="col-md-10">
                            {{ html()->number('cost')
                                ->class('form-control')
                                ->placeholder('Cost')
                                ->attribute('step', '0.01') }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label('Stock Quantity')->class('col-md-2 form-control-label')->for('stock_quantity') }}

                        <div class="col-md-10">
                            {{ html()->number('stock_quantity')
                                ->class('form-control')
                                ->placeholder('Stock Quantity')
                                ->attribute('min', '0') }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label('Is Available')->class('col-md-2 form-control-label')->for('is_available') }}

                        <div class="col-md-10">
                            <label class="switch switch-3d switch-primary">
                                @if($product->is_available)
                                    {{ html()->checkbox('is_available', true)->class('switch-input') }}
                                @else
                                    {{ html()->checkbox('is_available', false)->class('switch-input') }}
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
                    {{ form_cancel(route('admin.product.index'), __('buttons.general.cancel')) }}
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

        $('.category-select').select2({
            placeholder: "Choose Category"
        });
    });
</script>
@endpush