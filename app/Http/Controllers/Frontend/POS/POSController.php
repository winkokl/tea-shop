<?php

namespace App\Http\Controllers\Frontend\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Product\Entities\Product;
use Modules\Productcat\Entities\Productcat;
use Modules\Shop\Entities\Shop;
use Modules\Order\Entities\Order;
use Modules\Orderitem\Entities\Orderitem;
use Modules\Shoptable\Entities\Shoptable;
use Illuminate\Support\Facades\DB;

class POSController extends Controller
{
    /**
     * Check if user is employee
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check() || !auth()->user()->is_employee) {
                abort(403, 'Access denied. Only employees can access POS.');
            }
            return $next($request);
        });
    }

    /**
     * Display POS interface
     */
    public function index()
    {
        $employee = auth()->user()->employee;

        // Get all shops (employee can work at any shop)
        $shops = Shop::where('status', 1)->get();

        // Get all active categories
        $categories = Productcat::all();

        // Get all available products
        $products = Product::with(['shop', 'category'])
            ->where('is_available', 1)
            ->where('stock_quantity', '>', 0)
            ->get();

        return view('frontend.pos.index', compact('employee', 'shops', 'categories', 'products'));
    }

    /**
     * Get products by shop and category
     */
    public function getProducts(Request $request)
    {
        $query = Product::with(['shop', 'category'])
            ->where('is_available', 1)
            ->where('stock_quantity', '>', 0);

        if ($request->shop_id) {
            $query->where('shop_id', $request->shop_id);
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();

        return response()->json($products);
    }

    /**
     * Get tables by shop
     */
    public function getTables(Request $request)
    {
        $tables = Shoptable::where('shop_id', $request->shop_id)
            ->where('status', 'available')
            ->get();

        return response()->json($tables);
    }

    /**
     * Create order
     */
    public function createOrder(Request $request)
    {
        $request->validate([
            'shop_id' => 'required|exists:shops,id',
            'table_id' => 'nullable|exists:shoptables,id',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:product,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'discount_amount' => 'nullable|numeric|min:0',
            'final_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,card,mobile_payment',
        ]);

        DB::beginTransaction();

        try {
            // Generate order number
            $orderNumber = 'ORD-' . date('Ymd') . '-' . str_pad(Order::whereDate('created_at', today())->count() + 1, 4, '0', STR_PAD_LEFT);

            // Create order
            $order = Order::create([
                'shop_id' => $request->shop_id,
                'order_number' => $orderNumber,
                'table_id' => $request->table_id,
                'total_amount' => $request->total_amount,
                'discount_amount' => $request->discount_amount ?? 0,
                'final_amount' => $request->final_amount,
                'payment_method' => $request->payment_method,
                'payment_status' => 'paid',
                'order_status' => 'completed',
                'ordered_at' => now(),
            ]);

            // Create order items
            foreach ($request->items as $item) {
                Orderitem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'subtotal' => $item['quantity'] * $item['unit_price'],
                ]);

                // Update product stock
                $product = Product::find($item['product_id']);
                $product->decrement('stock_quantity', $item['quantity']);
            }

            // Update table status if table order
            if ($request->table_id) {
                Shoptable::where('id', $request->table_id)->update(['status' => 'occupied']);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order created successfully',
                'order' => $order->load('orderItems'),
                'order_number' => $orderNumber
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Failed to create order: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get today's orders
     */
    public function getTodayOrders()
    {
        $orders = Order::with(['shop', 'table'])
            ->whereDate('created_at', today())
            ->orderBy('created_at', 'desc')
            ->limit(20)
            ->get();

        return response()->json($orders);
    }
}
