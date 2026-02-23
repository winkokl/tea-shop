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
            ->addColumn('shop', function ($product) {
                return $product->shop ? $product->shop->name : 'N/A';
            })
            ->addColumn('category', function ($product) {
                return $product->category ? $product->category->name : 'N/A';
            })
            ->editColumn('org_price', function ($product) {
                return number_format($product->org_price, 2);
            })
            ->editColumn('promo_price', function ($product) {
                return number_format($product->promo_price, 2);
            })
            ->addColumn('status', function ($product) {
                return $product->availability_label;
            })
            ->addColumn('actions', function ($product) {
                return $product->action_buttons;
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }
}
