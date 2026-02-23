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
            ->addColumn('actions', function ($order) {
                return $order->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
