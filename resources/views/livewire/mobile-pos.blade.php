@push('styles')
<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    overflow: hidden;
}

.pos-wrapper {
    display: flex;
    flex-direction: row;
    height: 100vh;
    width: 100vw;
    overflow: hidden;
    position: fixed;
    top: 0;
    left: 0;
}

/* Left side */
.left-panel {
    flex: 3;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    background: #f5f5f5;
}

/* Right side */
.right-panel {
    flex: 2;
    display: flex;
    flex-direction: column;
    background: #fff;
    border-left: 2px solid #e0e0e0;
    box-shadow: -2px 0 8px rgba(0,0,0,0.1);
}

/* Header */
.pos-header {
    background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
    color: white;
    padding: 10px 15px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    flex-shrink: 0;
}

.pos-header h5 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

/* Category scroll */
.category-scroll {
    display: flex;
    overflow-x: auto;
    overflow-y: hidden;
    padding: 8px 10px;
    background: #fff;
    border-bottom: 1px solid #e0e0e0;
    gap: 8px;
    flex-shrink: 0;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
}

.category-scroll::-webkit-scrollbar {
    display: none;
}

.cat-btn {
    padding: 8px 16px;
    border: 2px solid #e0e0e0;
    background: white;
    border-radius: 25px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    white-space: nowrap;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

.cat-btn:hover {
    background: #f5f5f5;
    border-color: #1976d2;
}

.cat-btn.active {
    background: #1976d2;
    color: white;
    border-color: #1976d2;
}

/* Product grid */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 10px;
    padding: 12px;
    overflow-y: auto;
    height: 100%;
    -webkit-overflow-scrolling: touch;
}

.product-card {
    background: white;
    border-radius: 12px;
    padding: 10px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    cursor: pointer;
    transition: all 0.2s ease;
    border: 2px solid transparent;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.product-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(25, 118, 210, 0.2);
    border-color: #1976d2;
}

.product-card:active {
    transform: scale(0.98);
}

.product-card img {
    width: 100%;
    height: 90px;
    object-fit: cover;
    border-radius: 8px;
    background: #f5f5f5;
}

.product-name {
    margin-top: 8px;
    font-weight: 600;
    font-size: 13px;
    line-height: 1.3;
    color: #333;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.product-price {
    margin-top: 6px;
    color: #1976d2;
    font-weight: 700;
    font-size: 14px;
}

/* Cart */
.cart-header {
    padding: 12px 15px;
    border-bottom: 2px solid #e0e0e0;
    font-weight: 700;
    font-size: 16px;
    background: #f9f9f9;
    color: #333;
    flex-shrink: 0;
}

.cart-items {
    flex: 1;
    overflow-y: auto;
    padding: 10px;
    -webkit-overflow-scrolling: touch;
}

.cart-items::-webkit-scrollbar {
    width: 6px;
}

.cart-items::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.cart-items::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 3px;
}

.cart-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    padding: 10px;
    background: #f9f9f9;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    transition: background 0.2s;
}

.cart-row:hover {
    background: #f0f0f0;
}

.qty-control {
    display: flex;
    align-items: center;
    gap: 10px;
}

.qty-control button {
    padding: 6px 12px;
    border: 2px solid #ddd;
    background: white;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    font-size: 14px;
    transition: all 0.2s;
    min-width: 32px;
}

.qty-control button:hover {
    background: #1976d2;
    color: white;
    border-color: #1976d2;
}

.qty-control button:active {
    transform: scale(0.95);
}

.qty-control span {
    min-width: 30px;
    text-align: center;
    font-weight: bold;
    font-size: 16px;
}

.cart-footer {
    padding: 15px;
    border-top: 2px solid #e0e0e0;
    background: #fff;
    box-shadow: 0 -2px 8px rgba(0,0,0,0.08);
    flex-shrink: 0;
}

.total {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 12px;
    color: #333;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.checkout-btn {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #4caf50 0%, #45a049 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 2px 8px rgba(76, 175, 80, 0.3);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.checkout-btn:hover {
    background: linear-gradient(135deg, #45a049 0%, #388e3c 100%);
    box-shadow: 0 4px 12px rgba(76, 175, 80, 0.4);
    transform: translateY(-1px);
}

.checkout-btn:active {
    transform: scale(0.98);
}

.checkout-btn:disabled {
    background: #ccc;
    cursor: not-allowed;
    box-shadow: none;
    transform: none;
}

/* Table Selection Modal */
.table-selection-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    backdrop-filter: blur(4px);
    animation: fadeIn 0.2s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.table-selection-modal {
    background: white;
    border-radius: 16px;
    padding: 24px;
    max-width: 600px;
    width: 90%;
    max-height: 85vh;
    overflow-y: auto;
    box-shadow: 0 8px 32px rgba(0,0,0,0.2);
    animation: slideUp 0.3s ease;
}

@keyframes slideUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal-header {
    text-align: center;
    margin-bottom: 20px;
}

.modal-header h3 {
    margin: 0 0 8px 0;
    color: #1976d2;
    font-size: 22px;
    font-weight: 700;
}

.modal-header h4 {
    margin: 0;
    color: #666;
    font-size: 16px;
    font-weight: 600;
}

.modal-header p {
    margin: 0;
    color: #999;
    font-size: 14px;
}

.table-type-buttons {
    display: flex;
    gap: 12px;
    margin-bottom: 24px;
}

.type-btn {
    flex: 1;
    padding: 18px;
    border: 3px solid #ff9800;
    background: white;
    border-radius: 12px;
    font-size: 17px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease;
    color: #ff9800;
    box-shadow: 0 2px 8px rgba(255, 152, 0, 0.2);
}

.type-btn:hover {
    background: #ff9800;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 152, 0, 0.4);
}

.type-btn:active {
    transform: scale(0.98);
}

.type-btn.takeaway {
    border-color: #ff9800;
    color: #ff9800;
}

.type-btn.takeaway:hover {
    background: #ff9800;
    color: white;
}

.table-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
    gap: 12px;
    max-height: 300px;
    overflow-y: auto;
    padding: 4px;
}

.table-btn {
    padding: 20px;
    border: 3px solid #e0e0e0;
    background: white;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease;
    color: #333;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
}

.table-btn:hover {
    background: #1976d2;
    color: white;
    border-color: #1976d2;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(25, 118, 210, 0.3);
}

.table-btn:active {
    transform: scale(0.96);
}

/* Table info display */
.table-info {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
    padding: 10px 15px;
    border-radius: 8px;
    margin: 8px 12px;
    box-shadow: 0 2px 6px rgba(255, 152, 0, 0.2);
    border: 2px solid #ffb74d;
    flex-shrink: 0;
}

.table-info.takeaway {
    background: linear-gradient(135deg, #ffe0b2 0%, #ffcc80 100%);
}

.table-info-text {
    font-weight: 700;
    color: #e65100;
    font-size: 15px;
}

.change-table-btn {
    padding: 8px 16px;
    background: #ff9800;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.change-table-btn:hover {
    background: #f57c00;
    transform: translateY(-1px);
    box-shadow: 0 3px 6px rgba(0,0,0,0.3);
}

.change-table-btn:active {
    transform: scale(0.96);
}

/* Responsive styles for landscape mobile */
@media (max-width: 900px) and (orientation: landscape) {
    .pos-header h5 {
        font-size: 16px;
    }

    .product-grid {
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 8px;
    }

    .product-card img {
        height: 70px;
    }

    .product-name {
        font-size: 12px;
    }

    .product-price {
        font-size: 13px;
    }

    .cart-row {
        padding: 8px;
        font-size: 13px;
    }

    .total {
        font-size: 18px;
    }

    .checkout-btn {
        padding: 12px;
        font-size: 14px;
    }
}

/* Portrait mobile */
@media (max-width: 600px) and (orientation: portrait) {
    .pos-wrapper {
        flex-direction: column;
    }

    .left-panel {
        flex: 1;
    }

    .right-panel {
        flex: 0 0 45%;
        border-left: none;
        border-top: 2px solid #e0e0e0;
    }

    .product-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .table-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Small landscape screens */
@media (max-height: 500px) {
    .pos-header {
        padding: 8px 12px;
    }

    .pos-header h5 {
        font-size: 14px;
    }

    .category-scroll {
        padding: 6px 8px;
    }

    .cat-btn {
        padding: 6px 12px;
        font-size: 12px;
    }

    .product-grid {
        padding: 8px;
        gap: 6px;
    }

    .product-card {
        padding: 6px;
    }

    .product-card img {
        height: 60px;
    }

    .cart-footer {
        padding: 10px;
    }

    .checkout-btn {
        padding: 10px;
    }
}
</style>
@endpush

<div class="pos-wrapper">

    <!-- Table Selection Modal -->
    @if($showTableSelection)
    <div class="table-selection-overlay">
        <div class="table-selection-modal">
            <div class="modal-header">
                <h3>Select Table or Take Away</h3>
                <p>Please choose a table number or select take-away</p>
            </div>

            <div class="table-type-buttons">
                <button wire:click="selectTakeAway" class="type-btn takeaway">
                    📦 Take Away
                </button>
            </div>

            <div class="modal-header">
                <h4 style="margin: 10px 0;">Or Select Table</h4>
            </div>

            <div class="table-grid">
                @forelse($tables as $table)
                    <button wire:click="selectTable({{ $table->id }})" class="table-btn">
                        {{ $table->table_number }}
                    </button>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 20px; color: #999;">
                        <p>No tables available</p>
                        <small>Please add tables in the admin panel</small>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    @endif

    <!-- Left Panel -->
    <div class="left-panel">
        {{-- Header --}}
        <div class="pos-header">
            <h5>Tea Shop POS</h5>
        </div>

        {{-- Table Info Display --}}
        @if($selectedTable || $isTakeAway)
        <div class="table-info {{ $isTakeAway ? 'takeaway' : '' }}">
            <div class="table-info-text">
                @if($isTakeAway)
                    📦 Take Away Order
                @else
                    🪑 Table {{ $selectedTableNumber }}
                @endif
            </div>
            <button wire:click="changeTable" class="change-table-btn">
                Change
            </button>
        </div>
        @endif

        {{-- Category Scroll --}}
        <div class="category-scroll">
            <button wire:click="selectCategory(null)" class="cat-btn {{ $selectedCategory === null ? 'active' : '' }}">All</button>
            @foreach($categories as $cat)
                <button wire:click="selectCategory({{ $cat->id }})"
                    class="cat-btn {{ $selectedCategory === $cat->id ? 'active' : '' }}">
                    {{ $cat->name }}
                </button>
            @endforeach
        </div>

        {{-- Product Grid --}}
        <div class="product-grid">
            @forelse($products as $product)
                <div class="product-card"
                     wire:click="addToCart({{ $product->id }})">

                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22%3E%3Crect fill=%22%23f0f0f0%22 width=%22100%22 height=%22100%22/%3E%3Ctext fill=%22%23999%22 x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22%3ENo Image%3C/text%3E%3C/svg%3E'" />
                    @else
                        <div style="width: 100%; height: 100px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                            <span style="color: #999;">No Image</span>
                        </div>
                    @endif

                    <div class="product-name">
                        {{ $product->name }}
                    </div>

                    <div class="product-price">
                        {{ number_format($product->org_price) }} MMK
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #999;">
                    <p>No products available</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Right Panel -->
    <div class="right-panel">
        <div class="cart-header">
            🛒 Cart Summary
        </div>

        <div class="cart-items">
            @forelse($cart as $id => $item)
                <div class="cart-row">
                    <div style="flex: 1;">
                        <div style="font-weight: 600; color: #333; margin-bottom: 4px;">{{ $item['name'] }}</div>
                        <div style="font-size: 12px; color: #666;">{{ number_format($item['price']) }} MMK × {{ $item['qty'] }}</div>
                        <div style="font-weight: 700; color: #1976d2; margin-top: 4px;">{{ number_format($item['price'] * $item['qty']) }} MMK</div>
                    </div>

                    <div class="qty-control">
                        <button wire:click="decreaseQty({{ $id }})">−</button>
                        <span>{{ $item['qty'] }}</span>
                        <button wire:click="increaseQty({{ $id }})">+</button>
                    </div>
                </div>
            @empty
                <div style="text-align: center; color: #999; padding: 40px 20px;">
                    <div style="font-size: 48px; margin-bottom: 10px;">🛒</div>
                    <p style="font-size: 16px; font-weight: 600; margin: 0 0 8px 0;">Cart is empty</p>
                    <p style="font-size: 14px; margin: 0;">Add products to get started</p>
                </div>
            @endforelse
        </div>

        <div class="cart-footer">
            <div class="total">
                <span>Total:</span>
                <span>{{ number_format($total) }} MMK</span>
            </div>
            <button wire:click="checkout" class="checkout-btn" {{ empty($cart) ? 'disabled' : '' }}>
                💳 Checkout
            </button>
        </div>
    </div>

</div>
