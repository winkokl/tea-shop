<?php

namespace Modules\Region\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Region\Repositories\RegionRepository;
use Modules\Region\Http\Requests\ManageRegionRequest;

class RegionTableController extends Controller
{
    /**
     * @var RegionRepository
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
     * @param ManageRegionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRegionRequest $request)
    {
        return DataTables::of($this->region->getForDataTable())
            ->editColumn('updated_at', function ($region){
                return $region->updated_at;
            })
            ->addColumn('status', function ($region){
                return $region->status;
            })
            ->addColumn('actions', function ($region) {
                return $region->action_buttons;
            })
            ->rawColumns(['status','actions'])
            ->make(true);
    }
}
