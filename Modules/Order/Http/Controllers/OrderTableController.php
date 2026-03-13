<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Order\Repositories\OrderRepository;
use Modules\Order\Http\Requests\ManageOrderRequest;

class OrderTableController extends Controller
{
    /**
     * @var OrderRepository
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
     * @param ManageOrderRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageOrderRequest $request)
    {
        return DataTables::of($this->order->getForDataTable())
            ->addColumn('order_number', function ($order) {
                return $order->order_number;
            })
            ->addColumn('shop', function ($order) {
                return $order->shop ? $order->shop->name : 'N/A';
            })
            ->addColumn('table', function ($order) {
                return $order->table ? $order->table->table_number : 'N/A';
            })
            ->addColumn('total_amount', function ($order) {
                return number_format($order->total_amount, 2);
            })
            ->addColumn('final_amount', function ($order) {
                return number_format($order->final_amount, 2);
            })
            ->addColumn('payment_method', function ($order) {
                return $order->payment_method_label;
            })
            ->addColumn('payment_status', function ($order) {
                return $order->payment_status_label;
            })
            ->addColumn('order_status', function ($order) {
                return $order->order_status_label;
            })
            ->addColumn('ordered_at', function ($order) {
                return $order->ordered_at;
            })
            ->addColumn('updated_at', function ($order) {
                return $order->updated_at;
            })
            ->addColumn('actions', function ($order) {
                return $order->action_buttons;
            })
            ->rawColumns(['payment_method', 'payment_status', 'order_status', 'actions'])
            ->make(true);
    }
}
