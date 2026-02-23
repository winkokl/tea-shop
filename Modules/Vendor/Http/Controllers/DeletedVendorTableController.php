<?php

namespace Modules\Vendor\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Vendor\Http\Requests\ManageVendorRequest;
use Carbon\Carbon;
use DataTables;
use Modules\Vendor\Repositories\VendorRepository;

class DeletedVendorTableController extends Controller
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
        return DataTables::of($this->vendor->getDeletedVendorForDataTable())
            ->editColumn('region', function ($vendor) {
                return $vendor->region->name;
            })
             ->editColumn('township', function ($vendor) {
                return $vendor->township->name;
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
