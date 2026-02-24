<style>
body {
    margin: 0;
    font-family: sans-serif;
}

.pos-header {
    background: #1976d2;
    color: white;
    padding: 12px;
    text-align: center;
}

.category-scroll {
    display: flex;
    overflow-x: auto;
    padding: 10px;
    background: #f5f5f5;
}

.cat-btn {
    margin-right: 8px;
    padding: 8px 12px;
    border: none;
    background: white;
    border-radius: 20px;
    font-size: 14px;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 8px;
    padding: 10px;
    margin-bottom: 200px;
}

.product-card {
    background: white;
    border-radius: 10px;
    padding: 8px;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.product-card img {
    width: 100%;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
}

.cart-panel {
    position: fixed;
    bottom: 0;
    width: 100%;
    background: white;
    max-height: 250px;
    border-top: 1px solid #ddd;
    display: flex;
    flex-direction: column;
}

.cart-items {
    overflow-y: auto;
    padding: 10px;
    flex: 1;
}

.cart-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}

.qty-control button {
    padding: 4px 8px;
}

.cart-footer {
    padding: 10px;
    border-top: 1px solid #ddd;
}

.checkout-btn {
    width: 100%;
    padding: 10px;
    background: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
}
</style>
<div class="pos-wrapper">

    {{-- Header --}}
    <div class="pos-header">
        <h5>Tea Shop POS</h5>
    </div>

    {{-- Category Scroll --}}
    <div class="category-scroll">
        <button wire:click="mount()" class="cat-btn">All</button>
        @foreach($categories as $cat)
            <button wire:click="selectCategory({{ $cat->id }})"
                class="cat-btn">
                {{ $cat->name }}
            </button>
        @endforeach
    </div>

    {{-- Product Grid --}}
    <div class="product-grid">
        @foreach($products as $product)
            <div class="product-card"
                 wire:click="addToCart({{ $product->id }})">

                <img src="{{ asset($product->image) }}" />

                <div class="product-name">
                    {{ $product->name }}
                </div>

                <div class="product-price">
                    {{ number_format($product->org_price) }} MMK
                </div>
            </div>
        @endforeach
    </div>

    {{-- Cart Bottom Panel --}}
    <div class="cart-panel">

        <div class="cart-items">
            @foreach($cart as $id => $item)
                <div class="cart-row">
                    <div>
                        {{ $item['name'] }} <br>
                        {{ number_format($item['price']) }}
                    </div>

                    <div class="qty-control">
                        <button wire:click="decreaseQty({{ $id }})">-</button>
                        <span>{{ $item['qty'] }}</span>
                        <button wire:click="increaseQty({{ $id }})">+</button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cart-footer">
            <div class="total">
                Total: {{ number_format($total) }} MMK
            </div>
            <button class="checkout-btn">
                Checkout
            </button>
        </div>
    </div>

</div>