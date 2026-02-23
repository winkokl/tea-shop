<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\ManageProductRequest;
use Modules\Product\Http\Requests\CreateProductRequest;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Product\Http\Requests\ShowProductRequest;
use Modules\Product\Repositories\ProductRepository;
use Modules\Shop\Entities\Shop;
use Modules\Productcat\Entities\Productcat;

class ProductController extends Controller
{
 /**
     * @var ProductRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageProductRequest $request)
    {
        return view('product::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageProductRequest $request)
    {
        $shops = Shop::all();
        $categories = Productcat::all();
        return view('product::create')
            ->with('shops', $shops)
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->except('_token','_method');
        $input['is_available'] = isset($input['is_available']) ? 1 : 0;

        $this->product->create($input);
        return redirect()->route('admin.product.index')->withFlashSuccess(trans('product::alerts.backend.product.created'));
    }

    /**
     * @param Product              $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function edit(Product $product, ManageProductRequest $request)
    {
        $shops = Shop::all();
        $categories = Productcat::all();
        return view('product::edit')
            ->withProduct($product)
            ->with('shops', $shops)
            ->with('categories', $categories);
    }

    /**
     * @param Product              $product
     * @param UpdateProductRequest $request
     *
     * @return mixed
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $input = $request->except('_token','_method');
        $input['is_available'] = isset($input['is_available']) ? 1 : 0;

        $this->product->updateById($product->id, $input);

        return redirect()->route('admin.product.index')->withFlashSuccess(trans('product::alerts.backend.product.updated'));
    }

    /**
     * @param Product              $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function show(Product $product, ShowProductRequest $request)
    {
        return view('product::show')->withProduct($product);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Product $product)
    {
        $this->product->deleteById($product->id);

        return redirect()->route('admin.product.index')->withFlashSuccess(trans('product::alerts.backend.product.deleted'));
    }
}
