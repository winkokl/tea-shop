<?php

namespace Modules\Productcat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Productcat\Entities\Productcat;
use Modules\Productcat\Http\Requests\ManageProductcatRequest;
use Modules\Productcat\Http\Requests\CreateProductcatRequest;
use Modules\Productcat\Http\Requests\UpdateProductcatRequest;
use Modules\Productcat\Http\Requests\ShowProductcatRequest;
use Modules\Productcat\Repositories\ProductcatRepository;

class ProductcatController extends Controller
{
 /**
     * @var ProductcatRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageProductcatRequest $request)
    {
        return view('productcat::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageProductcatRequest $request)
    {
        return view('productcat::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateProductcatRequest $request)
    {
        $this->productcat->create($request->except('_token','_method'));
        return redirect()->route('admin.productcat.index')->withFlashSuccess(trans('productcat::alerts.backend.productcat.created'));
    }

    /**
     * @param Productcat              $productcat
     * @param ManageProductcatRequest $request
     *
     * @return mixed
     */
    public function edit(Productcat $productcat, ManageProductcatRequest $request)
    {
        return view('productcat::edit')
            ->withProductcat($productcat);
    }

    /**
     * @param Productcat              $productcat
     * @param UpdateProductcatRequest $request
     *
     * @return mixed
     */
    public function update(Productcat $productcat, UpdateProductcatRequest $request)
    {
        $this->productcat->updateById($productcat->id,$request->except('_token','_method'));

        return redirect()->route('admin.productcat.index')->withFlashSuccess(trans('productcat::alerts.backend.productcat.updated'));
    }

    /**
     * @param Productcat              $productcat
     * @param ManageProductcatRequest $request
     *
     * @return mixed
     */
    public function show(Productcat $productcat, ShowProductcatRequest $request)
    {
        return view('productcat::show')->withProductcat($productcat);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Productcat $productcat)
    {
        $this->productcat->deleteById($productcat->id);

        return redirect()->route('admin.productcat.index')->withFlashSuccess(trans('productcat::alerts.backend.productcat.deleted'));
    }
}
