<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Http\Requests\ManageProductRequest;

class ProductTableController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $product;

    /**
     * @param ProductRepository $product
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProductRequest $request)
    {
        return DataTables::of($this->product->getForDataTable())
            ->addColumn('actions', function ($product) {
                return $product->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
