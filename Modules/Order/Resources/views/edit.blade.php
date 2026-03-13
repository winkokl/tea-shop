@extends ('backend.layouts.app')

@section ('title', __('order::labels.backend.order.management') . ' | ' . __('order::labels.backend.order.edit'))

@section('breadcrumb-links')
    @include('order::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
@endpush

@section('content')
{{ html()->modelForm($order, 'PATCH', route('admin.order.update', $order->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('order::labels.backend.order.management') }}
                        <small class="text-muted">{{ __('order::labels.backend.order.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label('Shop')->class('col-md-2 form-control-label')->for('shop_id') }}
                        <div class="col-md-10">
                            <select name="shop_id" id="shop_id" class="form-control shop-select" required>
                                <option value=""></option>
                                @foreach($shops as $shop)
                                    <option value="{{ $shop->id }}" {{ $order->shop_id == $shop->id ? 'selected' : '' }}>{{ $shop->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Table')->class('col-md-2 form-control-label')->for('table_id') }}
                        <div class="col-md-10">
                            <select name="table_id" id="table_id" class="form-control table-select" required>
                                <option value=""></option>
                                @foreach(\Modules\Shoptable\Entities\Shoptable::where('shop_id', $order->shop_id)->get() as $table)
                                    <option value="{{ $table->id }}" {{ $order->table_id == $table->id ? 'selected' : '' }}>{{ $table->table_number }} (Capacity: {{ $table->capacity }})</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Order Number')->class('col-md-2 form-control-label')->for('order_number') }}
                        <div class="col-md-10">
                            {{ html()->text('order_number')
                                ->class('form-control')
                                ->placeholder('Order Number')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Total Amount')->class('col-md-2 form-control-label')->for('total_amount') }}
                        <div class="col-md-10">
                            {{ html()->number('total_amount')
                                ->class('form-control')
                                ->placeholder('0.00')
                                ->attribute('step', '0.01')
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Discount Amount')->class('col-md-2 form-control-label')->for('discount_amount') }}
                        <div class="col-md-10">
                            {{ html()->number('discount_amount')
                                ->class('form-control')
                                ->placeholder('0.00')
                                ->attribute('step', '0.01') }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Final Amount')->class('col-md-2 form-control-label')->for('final_amount') }}
                        <div class="col-md-10">
                            {{ html()->number('final_amount')
                                ->class('form-control')
                                ->placeholder('0.00')
                                ->attribute('step', '0.01')
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Payment Method')->class('col-md-2 form-control-label')->for('payment_method') }}
                        <div class="col-md-10">
                            <select name="payment_method" id="payment_method" class="form-control payment-method-select" required>
                                <option value="cash" {{ $order->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                                <option value="kbzpay" {{ $order->payment_method == 'kbzpay' ? 'selected' : '' }}>KBZ Pay</option>
                                <option value="wavepay" {{ $order->payment_method == 'wavepay' ? 'selected' : '' }}>Wave Pay</option>
                                <option value="card" {{ $order->payment_method == 'card' ? 'selected' : '' }}>Card</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Payment Status')->class('col-md-2 form-control-label')->for('payment_status') }}
                        <div class="col-md-10">
                            <select name="payment_status" id="payment_status" class="form-control payment-status-select" required>
                                <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="cancelled" {{ $order->payment_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Order Status')->class('col-md-2 form-control-label')->for('order_status') }}
                        <div class="col-md-10">
                            <select name="order_status" id="order_status" class="form-control order-status-select" required>
                                <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="preparing" {{ $order->order_status == 'preparing' ? 'selected' : '' }}>Preparing</option>
                                <option value="completed" {{ $order->order_status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Ordered At')->class('col-md-2 form-control-label')->for('ordered_at') }}
                        <div class="col-md-10">
                            {{ html()->input('datetime-local', 'ordered_at')
                                ->class('form-control')
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <hr>

                    <h5 class="mb-3">Order Items</h5>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="items-table">
                            <thead>
                                <tr>
                                    <th width="40%">Product</th>
                                    <th width="15%">Quantity</th>
                                    <th width="15%">Unit Price</th>
                                    <th width="20%">Subtotal</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="items-tbody">
                                @if($order->items && $order->items->count() > 0)
                                    @foreach($order->items as $index => $item)
                                        <tr class="item-row">
                                            <td>
                                                <select name="items[{{ $index }}][product_id]" class="form-control product-select" data-index="{{ $index }}" required>
                                                    <option value="{{ $item->product_id }}">{{ $item->product_name }}</option>
                                                </select>
                                                <input type="hidden" name="items[{{ $index }}][product_name]" class="product-name" value="{{ $item->product_name }}">
                                            </td>
                                            <td>
                                                <input type="number" name="items[{{ $index }}][quantity]" class="form-control item-quantity" min="1" value="{{ $item->quantity }}" data-index="{{ $index }}" required>
                                            </td>
                                            <td>
                                                <input type="number" name="items[{{ $index }}][unit_price]" class="form-control item-price" step="0.01" value="{{ $item->unit_price }}" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="items[{{ $index }}][subtotal]" class="form-control item-subtotal" step="0.01" value="{{ $item->subtotal }}" readonly>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-item"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="item-row">
                                        <td>
                                            <select name="items[0][product_id]" class="form-control product-select" data-index="0" required>
                                                <option value=""></option>
                                            </select>
                                            <input type="hidden" name="items[0][product_name]" class="product-name">
                                        </td>
                                        <td>
                                            <input type="number" name="items[0][quantity]" class="form-control item-quantity" min="1" value="1" data-index="0" required>
                                        </td>
                                        <td>
                                            <input type="number" name="items[0][unit_price]" class="form-control item-price" step="0.01" readonly>
                                        </td>
                                        <td>
                                            <input type="number" name="items[0][subtotal]" class="form-control item-subtotal" step="0.01" readonly>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm remove-item"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <button type="button" class="btn btn-success btn-sm mb-3" id="add-item">
                        <i class="fas fa-plus"></i> Add Item
                    </button>

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.order.index'), __('buttons.general.cancel')) }}
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
    var itemIndex = {{ $order->items ? $order->items->count() : 1 }};
    var availableProducts = [];

    // Initialize select2
    $('.shop-select').select2({
        placeholder: "Choose Shop",
        allowClear: true
    });

    $('.table-select').select2({
        placeholder: "Choose Table",
        allowClear: true
    });

    $('.payment-method-select').select2({
        placeholder: "Choose Payment Method"
    });

    $('.payment-status-select').select2({
        placeholder: "Choose Payment Status"
    });

    $('.order-status-select').select2({
        placeholder: "Choose Order Status"
    });

    // Initialize product select2
    initializeProductSelect();

    // Load products for the current shop on page load
    var currentShopId = '{{ $order->shop_id }}';
    if (currentShopId) {
        loadProducts(currentShopId);
    }

    // Load tables and products when shop is selected
    $('#shop_id').on('change', function() {
        var shopId = $(this).val();
        var tableSelect = $('#table_id');
        var currentTableId = '{{ $order->table_id }}';

        // Clear and reset table select
        tableSelect.empty().append('<option value=""></option>');

        if(shopId) {
            // Load tables
            $.ajax({
                url: '{{ route("admin.shoptable.get-by-shop", ":shopId") }}'.replace(':shopId', shopId),
                type: 'GET',
                success: function(data) {
                    if(data && data.length > 0) {
                        $.each(data, function(key, table) {
                            var selected = (table.id == currentTableId) ? 'selected' : '';
                            tableSelect.append('<option value="'+ table.id +'" '+ selected +'>'+ table.table_number +' (Capacity: '+ table.capacity +')</option>');
                        });
                    }
                    tableSelect.trigger('change');
                },
                error: function(xhr, status, error) {
                    console.error('Error loading tables:', error);
                }
            });

            // Load products
            loadProducts(shopId);
        }
    });

    function loadProducts(shopId) {
        $.ajax({
            url: '{{ route("admin.product.get-by-shop", ":shopId") }}'.replace(':shopId', shopId),
            type: 'GET',
            success: function(data) {
                availableProducts = data;
                updateAllProductSelects();
            },
            error: function(xhr, status, error) {
                console.error('Error loading products:', error);
            }
        });
    }

    // Add new item row
    $('#add-item').on('click', function() {
        addNewItemRow();
    });

    // Remove item row
    $(document).on('click', '.remove-item', function() {
        if ($('#items-tbody tr').length > 1) {
            $(this).closest('tr').remove();
            calculateTotal();
        }
    });

    // Product change event
    $(document).on('change', '.product-select', function() {
        var productId = $(this).val();
        var row = $(this).closest('tr');
        var product = availableProducts.find(p => p.id == productId);

        if (product) {
            row.find('.product-name').val(product.name);
            row.find('.item-price').val(product.promo_price || product.org_price);
            calculateRowTotal(row);
        }
    });

    // Quantity change event
    $(document).on('input', '.item-quantity', function() {
        var row = $(this).closest('tr');
        calculateRowTotal(row);
    });

    function initializeProductSelect() {
        $('.product-select').select2({
            placeholder: "Choose Product",
            allowClear: true
        });
    }

    function addNewItemRow() {
        var newRow = `
            <tr class="item-row">
                <td>
                    <select name="items[${itemIndex}][product_id]" class="form-control product-select" data-index="${itemIndex}" required>
                        <option value=""></option>
                    </select>
                    <input type="hidden" name="items[${itemIndex}][product_name]" class="product-name">
                </td>
                <td>
                    <input type="number" name="items[${itemIndex}][quantity]" class="form-control item-quantity" min="1" value="1" data-index="${itemIndex}" required>
                </td>
                <td>
                    <input type="number" name="items[${itemIndex}][unit_price]" class="form-control item-price" step="0.01" readonly>
                </td>
                <td>
                    <input type="number" name="items[${itemIndex}][subtotal]" class="form-control item-subtotal" step="0.01" readonly>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-item"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        `;

        $('#items-tbody').append(newRow);
        updateAllProductSelects();
        itemIndex++;
    }

    function updateAllProductSelects() {
        $('.product-select').each(function() {
            var currentVal = $(this).val();
            var select = $(this);

            // Only update if empty
            if (!currentVal || select.find('option').length <= 1) {
                select.empty().append('<option value=""></option>');

                $.each(availableProducts, function(key, product) {
                    select.append('<option value="'+ product.id +'">'+ product.name +' - '+ (product.promo_price || product.org_price) +'</option>');
                });
            }
        });

        // Reinitialize select2
        $('.product-select').select2({
            placeholder: "Choose Product",
            allowClear: true
        });
    }

    function calculateRowTotal(row) {
        var quantity = parseFloat(row.find('.item-quantity').val()) || 0;
        var price = parseFloat(row.find('.item-price').val()) || 0;
        var subtotal = quantity * price;

        row.find('.item-subtotal').val(subtotal.toFixed(2));
        calculateTotal();
    }

    function calculateTotal() {
        var total = 0;
        $('.item-subtotal').each(function() {
            total += parseFloat($(this).val()) || 0;
        });

        $('#total_amount').val(total.toFixed(2));
        updateFinalAmount();
    }

    function updateFinalAmount() {
        var total = parseFloat($('#total_amount').val()) || 0;
        var discount = parseFloat($('#discount_amount').val()) || 0;
        var final = total - discount;
        $('#final_amount').val(final.toFixed(2));
    }

    // Auto-calculate final amount when discount changes
    $('#discount_amount').on('input', function() {
        updateFinalAmount();
    });

    // Calculate totals on page load
    calculateTotal();
});
</script>
@endpush