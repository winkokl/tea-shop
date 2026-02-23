<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Shop\Entities\Shop;
use Modules\Shop\Http\Requests\ManageShopRequest;
use Modules\Shop\Http\Requests\CreateShopRequest;
use Modules\Shop\Http\Requests\UpdateShopRequest;
use Modules\Shop\Http\Requests\ShowShopRequest;
use Modules\Shop\Repositories\ShopRepository;

class ShopController extends Controller
{
 /**
     * @var ShopRepository
     * @var CategoryRepository
     */
    protected $shop;

    /**
     * @param ShopRepository $shop
     */
    public function __construct(ShopRepository $shop)
    {
        $this->shop = $shop;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageShopRequest $request)
    {
        return view('shop::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageShopRequest $request)
    {
        return view('shop::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateShopRequest $request)
    {
        $this->shop->create($request->except('_token','_method'));
        return redirect()->route('admin.shop.index')->withFlashSuccess(trans('shop::alerts.backend.shop.created'));
    }

    /**
     * @param Shop              $shop
     * @param ManageShopRequest $request
     *
     * @return mixed
     */
    public function edit(Shop $shop, ManageShopRequest $request)
    {
        return view('shop::edit')
            ->withShop($shop);
    }

    /**
     * @param Shop              $shop
     * @param UpdateShopRequest $request
     *
     * @return mixed
     */
    public function update(Shop $shop, UpdateShopRequest $request)
    {
        $this->shop->updateById($shop->id,$request->except('_token','_method'));

        return redirect()->route('admin.shop.index')->withFlashSuccess(trans('shop::alerts.backend.shop.updated'));
    }

    /**
     * @param Shop              $shop
     * @param ManageShopRequest $request
     *
     * @return mixed
     */
    public function show(Shop $shop, ShowShopRequest $request)
    {
        return view('shop::show')->withShop($shop);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Shop $shop)
    {
        $this->shop->deleteById($shop->id);

        return redirect()->route('admin.shop.index')->withFlashSuccess(trans('shop::alerts.backend.shop.deleted'));
    }
}
