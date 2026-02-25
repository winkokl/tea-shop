<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Product\Entities\Product;
use Modules\Productcat\Entities\Productcat;
use Modules\Order\Entities\Order;
use Modules\Orderitem\Entities\Orderitem;
use Modules\Shoptable\Entities\Shoptable;

class MobilePos extends Component
{
    public $categories = [];
    public $products = [];
    public $cart = [];
    public $total = 0;
    public $subtotal = 0;
    public $tax = 0;
    public $selectedCategory = null;
    public $searchTerm = '';
    public $isCheckingOut = false;
    public $successMessage = '';

    // Table selection
    public $showTableSelection = true;
    public $selectedTable = null;
    public $selectedTableNumber = null;
    public $isTakeAway = false;
    public $tables = [];

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        // Ensure only employees can access this component
        if (!auth()->check() || !auth()->user()->is_employee) {
            abort(403, 'Unauthorized. Only employees can access this page.');
        }

        $this->loadCategories();
        $this->loadProducts();
        $this->loadTables();
    }

    public function loadTables()
    {
        $this->tables = Shoptable::orderBy('table_number', 'asc')->get();
    }

    public function loadCategories()
    {
        $this->categories = Productcat::all();
    }

    public function loadProducts()
    {
        $query = Product::query();

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        if ($this->searchTerm) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%');
        }

        $this->products = $query->get();
    }

    public function selectTable($tableId)
    {
        $table = Shoptable::find($tableId);
        if ($table) {
            $this->selectedTable = $tableId;
            $this->selectedTableNumber = $table->table_number;
            $this->isTakeAway = false;
            $this->showTableSelection = false;
        }
    }

    public function selectTakeAway()
    {
        $this->isTakeAway = true;
        $this->selectedTable = null;
        $this->showTableSelection = false;
    }

    public function changeTable()
    {
        $this->showTableSelection = true;
        $this->selectedTable = null;
        $this->selectedTableNumber = null;
        $this->isTakeAway = false;
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->loadProducts();
    }

    public function updatedSearchTerm()
    {
        $this->loadProducts();
    }

    public function addToCart($id)
    {
        // Check if table is selected
        if (!$this->selectedTable && !$this->isTakeAway) {
            $this->dispatchBrowserEvent('show-toast', ['message' => 'Please select table or take-away first', 'type' => 'warning']);
            $this->showTableSelection = true;
            return;
        }

        $product = Product::find($id);

        if (!$product) {
            $this->dispatchBrowserEvent('show-toast', ['message' => 'Product not found', 'type' => 'error']);
            return;
        }

        // Check stock if you have stock management
        // if ($product->stock < 1) {
        //     $this->dispatchBrowserEvent('show-toast', ['message' => 'Out of stock', 'type' => 'error']);
        //     return;
        // }

        if (isset($this->cart[$id])) {
            $this->cart[$id]['qty']++;
        } else {
            $this->cart[$id] = [
                'name'  => $product->name,
                'price' => $product->org_price ?? $product->price,
                'qty'   => 1,
                'image' => $product->image
            ];
        }

        $this->calculateTotal();
        $this->dispatchBrowserEvent('item-added');
    }

    public function increaseQty($id)
    {
        if (isset($this->cart[$id])) {
            $this->cart[$id]['qty']++;
            $this->calculateTotal();
        }
    }

    public function decreaseQty($id)
    {
        if (isset($this->cart[$id])) {
            if ($this->cart[$id]['qty'] > 1) {
                $this->cart[$id]['qty']--;
            } else {
                unset($this->cart[$id]);
            }
            $this->calculateTotal();
        }
    }

    public function removeFromCart($id)
    {
        if (isset($this->cart[$id])) {
            unset($this->cart[$id]);
            $this->calculateTotal();
        }
    }

    public function calculateTotal()
    {
        $this->subtotal = collect($this->cart)->sum(function ($item) {
            return $item['price'] * $item['qty'];
        });

        // Calculate tax (5% for example)
        $this->tax = $this->subtotal * 0.05;
        $this->total = $this->subtotal + $this->tax;
    }

    public function checkout()
    {
        if (empty($this->cart)) {
            $this->dispatchBrowserEvent('show-toast', ['message' => 'Cart is empty', 'type' => 'error']);
            return;
        }

        $this->isCheckingOut = true;

        try {
            // Create order
            $orderData = [
                'user_id' => auth()->id() ?? 1,
                'total' => $this->total,
                'subtotal' => $this->subtotal,
                'tax' => $this->tax,
                'total_amount' => $this->total,
                'final_amount' => $this->total,
                'status' => 'completed',
                'order_status' => 'completed',
                'payment_status' => 'paid',
                'payment_method' => 'cash',
                'ordered_at' => now(),
            ];

            // Add table_id only if it's not take-away
            if (!$this->isTakeAway && $this->selectedTable) {
                $orderData['table_id'] = $this->selectedTable;
            }

            $order = Order::create($orderData);

            // Create order items
            foreach ($this->cart as $productId => $item) {
                Orderitem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['qty'],
                    'price' => $item['price'],
                    'total' => $item['price'] * $item['qty'],
                ]);
            }

            // Clear cart
            $this->cart = [];
            $this->calculateTotal();

            // Reset table selection for next order
            $this->showTableSelection = true;
            $this->selectedTable = null;
            $this->selectedTableNumber = null;
            $this->isTakeAway = false;

            $this->successMessage = 'Order #' . $order->id . ' completed successfully!';
            $this->dispatchBrowserEvent('show-toast', ['message' => $this->successMessage, 'type' => 'success']);
            $this->dispatchBrowserEvent('order-complete', ['orderId' => $order->id]);

        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('show-toast', ['message' => 'Error: ' . $e->getMessage(), 'type' => 'error']);
        }

        $this->isCheckingOut = false;
    }

    public function clearCart()
    {
        $this->cart = [];
        $this->calculateTotal();
        $this->showTableSelection = true;
        $this->selectedTable = null;
        $this->selectedTableNumber = null;
        $this->isTakeAway = false;
        $this->dispatchBrowserEvent('show-toast', ['message' => 'Cart cleared', 'type' => 'info']);
    }

    public function render()
    {
        return view('livewire.mobile-pos')
            ->extends('mobile.layouts.master')
            ->section('content');
    }
}