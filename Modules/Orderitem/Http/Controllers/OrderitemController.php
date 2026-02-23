<?php

namespace Modules\Orderitem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Orderitem\Entities\Orderitem;
use Modules\Orderitem\Http\Requests\ManageOrderitemRequest;
use Modules\Orderitem\Http\Requests\CreateOrderitemRequest;
use Modules\Orderitem\Http\Requests\UpdateOrderitemRequest;
use Modules\Orderitem\Http\Requests\ShowOrderitemRequest;
use Modules\Orderitem\Repositories\OrderitemRepository;

class OrderitemController extends Controller
{
 /**
     * @var OrderitemRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageOrderitemRequest $request)
    {
        return view('orderitem::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageOrderitemRequest $request)
    {
        return view('orderitem::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateOrderitemRequest $request)
    {
        $this->orderitem->create($request->except('_token','_method'));
        return redirect()->route('admin.orderitem.index')->withFlashSuccess(trans('orderitem::alerts.backend.orderitem.created'));
    }

    /**
     * @param Orderitem              $orderitem
     * @param ManageOrderitemRequest $request
     *
     * @return mixed
     */
    public function edit(Orderitem $orderitem, ManageOrderitemRequest $request)
    {
        return view('orderitem::edit')
            ->withOrderitem($orderitem);
    }

    /**
     * @param Orderitem              $orderitem
     * @param UpdateOrderitemRequest $request
     *
     * @return mixed
     */
    public function update(Orderitem $orderitem, UpdateOrderitemRequest $request)
    {
        $this->orderitem->updateById($orderitem->id,$request->except('_token','_method'));

        return redirect()->route('admin.orderitem.index')->withFlashSuccess(trans('orderitem::alerts.backend.orderitem.updated'));
    }

    /**
     * @param Orderitem              $orderitem
     * @param ManageOrderitemRequest $request
     *
     * @return mixed
     */
    public function show(Orderitem $orderitem, ShowOrderitemRequest $request)
    {
        return view('orderitem::show')->withOrderitem($orderitem);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Orderitem $orderitem)
    {
        $this->orderitem->deleteById($orderitem->id);

        return redirect()->route('admin.orderitem.index')->withFlashSuccess(trans('orderitem::alerts.backend.orderitem.deleted'));
    }
}
