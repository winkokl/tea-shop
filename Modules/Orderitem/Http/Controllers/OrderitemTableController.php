<?php

namespace Modules\Orderitem\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Orderitem\Repositories\OrderitemRepository;
use Modules\Orderitem\Http\Requests\ManageOrderitemRequest;

class OrderitemTableController extends Controller
{
    /**
     * @var OrderitemRepository
     */
    protected $orderitem;

    /**
     * @param OrderitemRepository $orderitem
     */
    public function __construct(OrderitemRepository $orderitem)
    {
        $this->orderitem = $orderitem;
    }

    /**
     * @param ManageOrderitemRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageOrderitemRequest $request)
    {
        return DataTables::of($this->orderitem->getForDataTable())
            ->addColumn('actions', function ($orderitem) {
                return $orderitem->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
