<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Order\Entities\Order;
use Modules\Order\Http\Requests\ManageOrderRequest;
use Modules\Order\Http\Requests\CreateOrderRequest;
use Modules\Order\Http\Requests\UpdateOrderRequest;
use Modules\Order\Http\Requests\ShowOrderRequest;
use Modules\Order\Repositories\OrderRepository;

class OrderController extends Controller
{
 /**
     * @var OrderRepository
     * @var CategoryRepository
     */
    protected $order;

    /**
     * @param OrderRepository $order
     */
    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageOrderRequest $request)
    {
        return view('order::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageOrderRequest $request)
    {
        $shops = \Modules\Shop\Entities\Shop::all();
        return view('order::create')->with('shops', $shops);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $orderData = $request->except('_token', '_method', 'items');

        // Create order
        $order = $this->order->create($orderData);

        // Create order items
        if ($request->has('items') && is_array($request->items)) {
            foreach ($request->items as $item) {
                if (!empty($item['product_id']) && !empty($item['quantity'])) {
                    \Modules\Orderitem\Entities\Orderitem::create([
                        'order_id' => $order->id,
                        'product_id' => $item['product_id'],
                        'product_name' => $item['product_name'] ?? '',
                        'quantity' => $item['quantity'],
                        'unit_price' => $item['unit_price'] ?? 0,
                        'price' => $item['unit_price'] ?? 0,
                        'subtotal' => $item['subtotal'] ?? 0,
                        'total' => $item['subtotal'] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('admin.order.index')->withFlashSuccess(trans('order::alerts.backend.order.created'));
    }

    /**
     * @param Order              $order
     * @param ManageOrderRequest $request
     *
     * @return mixed
     */
    public function edit(Order $order, ManageOrderRequest $request)
    {
        $shops = \Modules\Shop\Entities\Shop::all();
        return view('order::edit')
            ->withOrder($order)
            ->with('shops', $shops);
    }

    /**
     * @param Order              $order
     * @param UpdateOrderRequest $request
     *
     * @return mixed
     */
    public function update(Order $order, UpdateOrderRequest $request)
    {
        $orderData = $request->except('_token', '_method', 'items');

        // Update order
        $this->order->updateById($order->id, $orderData);

        // Delete existing order items
        \Modules\Orderitem\Entities\Orderitem::where('order_id', $order->id)->delete();

        // Create new order items
        if ($request->has('items') && is_array($request->items)) {
            foreach ($request->items as $item) {
                if (!empty($item['product_id']) && !empty($item['quantity'])) {
                    \Modules\Orderitem\Entities\Orderitem::create([
                        'order_id' => $order->id,
                        'product_id' => $item['product_id'],
                        'product_name' => $item['product_name'] ?? '',
                        'quantity' => $item['quantity'],
                        'unit_price' => $item['unit_price'] ?? 0,
                        'price' => $item['unit_price'] ?? 0,
                        'subtotal' => $item['subtotal'] ?? 0,
                        'total' => $item['subtotal'] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('admin.order.index')->withFlashSuccess(trans('order::alerts.backend.order.updated'));
    }

    /**
     * @param Order              $order
     * @param ManageOrderRequest $request
     *
     * @return mixed
     */
    public function show(Order $order, ShowOrderRequest $request)
    {
        return view('order::show')->withOrder($order);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Order $order)
    {
        $this->order->deleteById($order->id);

        return redirect()->route('admin.order.index')->withFlashSuccess(trans('order::alerts.backend.order.deleted'));
    }
}
