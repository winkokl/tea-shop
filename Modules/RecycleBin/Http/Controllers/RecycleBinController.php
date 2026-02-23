<?php

namespace Modules\RecycleBin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\RecycleBin\Entities\RecycleBin;
use Modules\RecycleBin\Http\Requests\ManageRecycleBinRequest;
use Modules\RecycleBin\Http\Requests\CreateRecycleBinRequest;
use Modules\RecycleBin\Http\Requests\UpdateRecycleBinRequest;
use Modules\RecycleBin\Http\Requests\ShowRecycleBinRequest;
use Modules\RecycleBin\Repositories\RecycleBinRepository;

class RecycleBinController extends Controller
{
 /**
     * @var RecycleBinRepository
     * @var CategoryRepository
     */
    protected $recyclebin;

    /**
     * @param RecycleBinRepository $recyclebin
     */
    public function __construct(RecycleBinRepository $recyclebin)
    {
        $this->recyclebin = $recyclebin;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageRecycleBinRequest $request)
    {
        $module = $request->submodule;
        return view('recyclebin::index',compact('module'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageRecycleBinRequest $request)
    {
        return view('recyclebin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateRecycleBinRequest $request)
    {
        $this->recyclebin->create($request->except('_token','_method'));
        return redirect()->route('admin.recyclebin.index')->withFlashSuccess(trans('recyclebin::alerts.backend.recyclebin.created'));
    }

    /**
     * @param RecycleBin              $recyclebin
     * @param ManageRecycleBinRequest $request
     *
     * @return mixed
     */
    public function edit(RecycleBin $recyclebin, ManageRecycleBinRequest $request)
    {
        return view('recyclebin::edit')
            ->withRecycleBin($recyclebin);
    }

    /**
     * @param RecycleBin              $recyclebin
     * @param UpdateRecycleBinRequest $request
     *
     * @return mixed
     */
    public function update(RecycleBin $recyclebin, UpdateRecycleBinRequest $request)
    {
        $this->recyclebin->updateById($recyclebin->id,$request->except('_token','_method'));

        return redirect()->route('admin.recyclebin.index')->withFlashSuccess(trans('recyclebin::alerts.backend.recyclebin.updated'));
    }

    /**
     * @param RecycleBin              $recyclebin
     * @param ManageRecycleBinRequest $request
     *
     * @return mixed
     */
    public function show(RecycleBin $recyclebin, ShowRecycleBinRequest $request)
    {
        $name = strtolower($recyclebin->module);
        $NamespacedModel = $recyclebin->eloquent;
        $data = $NamespacedModel::onlyTrashed()->find($recyclebin->related_row_id);
        return view($name.'::show',[$name => $data]);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(RecycleBin $recyclebin)
    {
        $name = strtolower($recyclebin->module);
        $NamespacedModel = $recyclebin->eloquent;
        $module = $NamespacedModel::onlyTrashed()->find($recyclebin->related_row_id);

        $module->restore();

        $this->recyclebin->deleteById($recyclebin->id);
        return redirect()->route('admin.'.$name.'.index')->withFlashSuccess(trans('recyclebin::alerts.backend.recyclebin.restored'));
    }
}
