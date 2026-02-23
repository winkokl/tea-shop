<?php

namespace Modules\Customer\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use DataTables;
use Modules\Customer\Repositories\CustomerRepository;
use Modules\Customer\Http\Requests\ManageCustomerRequest;

class CustomerTableController extends Controller
{
    /**
     * @var CustomerRepository
     */
    protected $customer;

    /**
     * @param CustomerRepository $customer
     */
    public function __construct(CustomerRepository $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCustomerRequest $request)
    {
        return DataTables::of($this->customer->getForDataTable())
            ->editColumn('status', function ($customer) {
                return $customer->active ? '<label class="badge badge-success" >active</label>' : '<label class="badge badge-danger" >inactive</label>';
            })
            ->editColumn('updated_at', function ($customer) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $customer->updated_at);
            })
            ->addColumn('actions', function ($customer) {
                return $customer->action_buttons;
            })
            ->rawColumns(['status', 'updated_at', 'actions'])
            ->make(true);
    }
}
