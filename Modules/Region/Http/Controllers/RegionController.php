<?php

namespace Modules\Region\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Region\Entities\Region;
use Modules\Region\Http\Requests\ManageRegionRequest;
use Modules\Region\Http\Requests\CreateRegionRequest;
use Modules\Region\Http\Requests\UpdateRegionRequest;
use Modules\Region\Http\Requests\ShowRegionRequest;
use Modules\Region\Repositories\RegionRepository;

class RegionController extends Controller
{
 /**
     * @var RegionRepository
     * @var CategoryRepository
     */
    protected $region;

    /**
     * @param RegionRepository $region
     */
    public function __construct(RegionRepository $region)
    {
        $this->region = $region;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageRegionRequest $request)
    {
        return view('region::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageRegionRequest $request)
    {
        return view('region::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateRegionRequest $request)
    {
        $input = $request->except('_token','_method');
        $input['active']= isset($input['active']) ? 1 : 0 ;
        $this->region->create($input);
        return redirect()->route('admin.region.index')->withFlashSuccess(trans('region::alerts.backend.region.created'));
    }

    /**
     * @param Region              $region
     * @param ManageRegionRequest $request
     *
     * @return mixed
     */
    public function edit(Region $region, ManageRegionRequest $request)
    {
        return view('region::edit')
            ->withRegion($region);
    }

    /**
     * @param Region              $region
     * @param UpdateRegionRequest $request
     *
     * @return mixed
     */
    public function update(Region $region, UpdateRegionRequest $request)
    {
        $input = $request->except('_token','_method');
        $input['active'] = isset($input['active']) ? 1 : 0 ;
        $this->region->updateById($region->id,$input);

        return redirect()->route('admin.region.index')->withFlashSuccess(trans('region::alerts.backend.region.updated'));
    }

    /**
     * @param Region              $region
     * @param ManageRegionRequest $request
     *
     * @return mixed
     */
    public function show(Region $region, ShowRegionRequest $request)
    {
        return view('region::show')->withRegion($region);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Region $region)
    {
        $this->region->deleteById($region->id);

        return redirect()->route('admin.region.index')->withFlashSuccess(trans('region::alerts.backend.region.deleted'));
    }
}
