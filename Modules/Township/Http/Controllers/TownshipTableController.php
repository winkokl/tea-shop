<?php

namespace Modules\Township\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Township\Repositories\TownshipRepository;
use Modules\Township\Http\Requests\ManageTownshipRequest;

class TownshipTableController extends Controller
{
    /**
     * @var TownshipRepository
     */
    protected $township;

    /**
     * @param TownshipRepository $township
     */
    public function __construct(TownshipRepository $township)
    {
        $this->township = $township;
    }

    /**
     * @param ManageTownshipRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTownshipRequest $request)
    {
        return DataTables::of($this->township->getForDataTable())
            ->addColumn('status', function ($township) {
                return $township->status;
            })
            ->addColumn('updated_at',function($township){
                return $township->updated_at;
            })
            ->addColumn('actions', function ($township) {
                return $township->action_buttons;
            })
            ->rawColumns(['status','actions'])
            ->make(true);
    }
}
