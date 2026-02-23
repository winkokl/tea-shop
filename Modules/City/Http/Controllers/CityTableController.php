<?php

namespace Modules\City\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\City\Repositories\CityRepository;
use Modules\City\Http\Requests\ManageCityRequest;

class CityTableController extends Controller
{
    /**
     * @var CityRepository
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
     * @param ManageCityRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCityRequest $request)
    {
        return DataTables::of($this->city->getForDataTable())
            ->addColumn('status', function ($city) {
                return $city->status;
            })
            ->addColumn('updated_at', function ($city) {
                return $city->updated_at;
            })
            ->addColumn('actions', function ($city) {
                return $city->action_buttons;
            })
            ->rawColumns(['status','actions'])
            ->make(true);
    }
}
