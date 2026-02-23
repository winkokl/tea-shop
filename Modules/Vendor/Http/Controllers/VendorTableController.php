<?php

namespace Modules\Vendor\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use DataTables;
use Modules\Vendor\Repositories\VendorRepository;
use Modules\Vendor\Http\Requests\ManageVendorRequest;

class VendorTableController extends Controller
{
    /**
     * @var VendorRepository
     */
    protected $vendor;

    /**
     * @param VendorRepository $vendor
     */
    public function __construct(VendorRepository $vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * @param ManageVendorRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageVendorRequest $request)
    {
        return DataTables::of($this->vendor->getForDataTable())
            ->editColumn('township', function ($vendor) {
                return $vendor->township->name;
            })
            ->editColumn('region', function ($vendor) {
                return $vendor->region->name;
            })
            ->editColumn('updated_at', function ($vendor) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $vendor->updated_at);
            })
            ->addColumn('actions', function ($vendor) {
                return $vendor->action_buttons;
            })
            ->rawColumns(['actions','township','region'])
            ->make(true);
    }
}
