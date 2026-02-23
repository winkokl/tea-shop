<?php

namespace Modules\City\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\City\Entities\City;
use Modules\City\Http\Requests\ManageCityRequest;
use Modules\City\Http\Requests\CreateCityRequest;
use Modules\City\Http\Requests\UpdateCityRequest;
use Modules\City\Http\Requests\ShowCityRequest;
use Modules\City\Repositories\CityRepository;

class CityController extends Controller
{
 /**
     * @var CityRepository
     * @var CategoryRepository
     */
    protected $city;

    /**
     * @param CityRepository $city
     */
    public function __construct(CityRepository $city)
    {
        $this->city = $city;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageCityRequest $request)
    {
        return view('city::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageCityRequest $request)
    {
        return view('city::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateCityRequest $request)
    {
        $input          = $request->except('_token','_method');
        $input['active']= isset($input['active']) ? 1 : 0 ;

        $this->city->create($input);
        return redirect()->route('admin.city.index')->withFlashSuccess(trans('city::alerts.backend.city.created'));
    }

    /**
     * @param City              $city
     * @param ManageCityRequest $request
     *
     * @return mixed
     */
    public function edit(City $city, ManageCityRequest $request)
    {
        return view('city::edit')
            ->withCity($city);
    }

    /**
     * @param City              $city
     * @param UpdateCityRequest $request
     *
     * @return mixed
     */
    public function update(City $city, UpdateCityRequest $request)
    {
        $input = $request->except('_token','_method');
        $input['active'] = isset($input['active']) ? 1 : 0 ;
        
        $this->city->updateById($city->id,$input);

        return redirect()->route('admin.city.index')->withFlashSuccess(trans('city::alerts.backend.city.updated'));
    }

    /**
     * @param City              $city
     * @param ManageCityRequest $request
     *
     * @return mixed
     */
    public function show(City $city, ShowCityRequest $request)
    {
        return view('city::show')->withCity($city);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(City $city)
    {
        $this->city->deleteById($city->id);

        return redirect()->route('admin.city.index')->withFlashSuccess(trans('city::alerts.backend.city.deleted'));
    }
}
