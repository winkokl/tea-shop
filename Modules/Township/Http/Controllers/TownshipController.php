<?php

namespace Modules\Township\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Township\Entities\Township;
use Modules\Township\Http\Requests\ManageTownshipRequest;
use Modules\Township\Http\Requests\CreateTownshipRequest;
use Modules\Township\Http\Requests\UpdateTownshipRequest;
use Modules\Township\Http\Requests\ShowTownshipRequest;
use Modules\Township\Repositories\TownshipRepository;
use Modules\Region\Repositories\RegionRepository;
use Modules\Region\Entities\Region;

class TownshipController extends Controller
{
 /**
     * @var TownshipRepository
     * @var CategoryRepository
     */
    protected $township;
    protected $region;

    /**
     * @param TownshipRepository $township
     */
    public function __construct(TownshipRepository $township,RegionRepository $region)
    {
        $this->township = $township;
        $this->region   = $region;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageTownshipRequest $request)
    {
        return view('township::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageTownshipRequest $request)
    {
        $regions = Region::all();
        return view('township::create')->with('regions',$regions);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateTownshipRequest $request)
    {
        $input          = $request->except('_token','_method');
        $input['active']= isset($input['active']) ? 1 : 0 ;
        
        $this->township->create($input);
        return redirect()->route('admin.township.index')->withFlashSuccess(trans('township::alerts.backend.township.created'));
    }

    /**
     * @param Township              $township
     * @param ManageTownshipRequest $request
     *
     * @return mixed
     */
    public function edit(Township $township, ManageTownshipRequest $request)
    {
        return view('township::edit')
            ->withTownship($township);
    }

    /**
     * @param Township              $township
     * @param UpdateTownshipRequest $request
     *
     * @return mixed
     */
    public function update(Township $township, UpdateTownshipRequest $request)
    {
        $request['active'] = $request->active ? 1 : 0;

        $this->township->updateById($township->id,$request->except('_token','_method'));

        return redirect()->route('admin.township.index')->withFlashSuccess(trans('township::alerts.backend.township.updated'));
    }

    /**
     * @param Township              $township
     * @param ManageTownshipRequest $request
     *
     * @return mixed
     */
    public function show(Township $township, ShowTownshipRequest $request)
    {
        return view('township::show')->withTownship($township);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Township $township)
    {
        $this->township->deleteById($township->id);

        return redirect()->route('admin.township.index')->withFlashSuccess(trans('township::alerts.backend.township.deleted'));
    }
}
