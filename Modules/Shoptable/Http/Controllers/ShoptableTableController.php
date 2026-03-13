<?php

namespace Modules\Shoptable\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Shoptable\Repositories\ShoptableRepository;
use Modules\Shoptable\Http\Requests\ManageShoptableRequest;

class ShoptableTableController extends Controller
{
    /**
     * @var ShoptableRepository
     */
    protected $shoptable;

    /**
     * @param ShoptableRepository $shoptable
     */
    public function __construct(ShoptableRepository $shoptable)
    {
        $this->shoptable = $shoptable;
    }

    /**
     * @param ManageShoptableRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageShoptableRequest $request)
    {
        return DataTables::of($this->shoptable->getForDataTable())
            ->addColumn('shop', function ($shoptable) {
                return $shoptable->shop ? $shoptable->shop->name : 'N/A';
            })
            ->addColumn('table_number', function ($shoptable) {
                return $shoptable->table_number;
            })
            ->addColumn('capacity', function ($shoptable) {
                return $shoptable->capacity;
            })
            ->addColumn('status', function ($shoptable) {
                return $shoptable->status_label;
            })
            ->addColumn('updated_at', function ($shoptable) {
                return $shoptable->updated_at;
            })
            ->addColumn('actions', function ($shoptable) {
                return $shoptable->action_buttons;
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }
}
