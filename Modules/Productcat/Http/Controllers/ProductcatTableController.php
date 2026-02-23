<?php

namespace Modules\Productcat\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Productcat\Repositories\ProductcatRepository;
use Modules\Productcat\Http\Requests\ManageProductcatRequest;

class ProductcatTableController extends Controller
{
    /**
     * @var ProductcatRepository
     */
    protected $productcat;

    /**
     * @param ProductcatRepository $productcat
     */
    public function __construct(ProductcatRepository $productcat)
    {
        $this->productcat = $productcat;
    }

    /**
     * @param ManageProductcatRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProductcatRequest $request)
    {
        return DataTables::of($this->productcat->getForDataTable())
            ->addColumn('actions', function ($productcat) {
                return $productcat->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
