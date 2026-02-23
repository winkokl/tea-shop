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
            ->addColumn('actions', function ($shoptable) {
                return $shoptable->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
