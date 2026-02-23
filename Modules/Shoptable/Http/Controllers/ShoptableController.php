<?php

namespace Modules\Shoptable\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Shoptable\Entities\Shoptable;
use Modules\Shoptable\Http\Requests\ManageShoptableRequest;
use Modules\Shoptable\Http\Requests\CreateShoptableRequest;
use Modules\Shoptable\Http\Requests\UpdateShoptableRequest;
use Modules\Shoptable\Http\Requests\ShowShoptableRequest;
use Modules\Shoptable\Repositories\ShoptableRepository;

class ShoptableController extends Controller
{
 /**
     * @var ShoptableRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageShoptableRequest $request)
    {
        return view('shoptable::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageShoptableRequest $request)
    {
        return view('shoptable::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateShoptableRequest $request)
    {
        $this->shoptable->create($request->except('_token','_method'));
        return redirect()->route('admin.shoptable.index')->withFlashSuccess(trans('shoptable::alerts.backend.shoptable.created'));
    }

    /**
     * @param Shoptable              $shoptable
     * @param ManageShoptableRequest $request
     *
     * @return mixed
     */
    public function edit(Shoptable $shoptable, ManageShoptableRequest $request)
    {
        return view('shoptable::edit')
            ->withShoptable($shoptable);
    }

    /**
     * @param Shoptable              $shoptable
     * @param UpdateShoptableRequest $request
     *
     * @return mixed
     */
    public function update(Shoptable $shoptable, UpdateShoptableRequest $request)
    {
        $this->shoptable->updateById($shoptable->id,$request->except('_token','_method'));

        return redirect()->route('admin.shoptable.index')->withFlashSuccess(trans('shoptable::alerts.backend.shoptable.updated'));
    }

    /**
     * @param Shoptable              $shoptable
     * @param ManageShoptableRequest $request
     *
     * @return mixed
     */
    public function show(Shoptable $shoptable, ShowShoptableRequest $request)
    {
        return view('shoptable::show')->withShoptable($shoptable);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Shoptable $shoptable)
    {
        $this->shoptable->deleteById($shoptable->id);

        return redirect()->route('admin.shoptable.index')->withFlashSuccess(trans('shoptable::alerts.backend.shoptable.deleted'));
    }
}
