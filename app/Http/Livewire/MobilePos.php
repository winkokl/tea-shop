<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Product\Entities\Product;
use Modules\Productcat\Entities\Productcat;

class MobilePos extends Component
{
    public $categories = [];
    public $products = [];
    public $cart = [];
    public $total = 0;
    public $selectedCategory = null;

    public function mount()
    {
        $this->categories = Productcat::all();
        $this->products   = Product::all();
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;

        if ($categoryId) {
            $this->products = Product::where('category_id', $categoryId)->get();
        } else {
            $this->products = Product::all();
        }
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) return;

        if (isset($this->cart[$id])) {
            $this->cart[$id]['qty']++;
        } else {
            $this->cart[$id] = [
                'name'  => $product->name,
                'price' => $product->price,
                'qty'   => 1
            ];
        }

        $this->calculateTotal();
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

    public function calculateTotal()
    {
        $this->total = collect($this->cart)->sum(function ($item) {
            return $item['price'] * $item['qty'];
        });
    }

    public function render()
    {
        return view('livewire.mobile-pos')
            ->extends('mobile.layouts.master')
        ->section('content');
    }
}