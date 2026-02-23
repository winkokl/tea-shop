<?php

namespace Modules\Employee\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use DataTables;
use Modules\Employee\Repositories\EmployeeRepository;
use Modules\Employee\Http\Requests\ManageEmployeeRequest;

class EmployeeTableController extends Controller
{
    /**
     * @var EmployeeRepository
     */
    protected $employee;

    /**
     * @param EmployeeRepository $employee
     */
    public function __construct(EmployeeRepository $employee)
    {
        $this->employee = $employee;
    }

    /**
     * @param ManageEmployeeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageEmployeeRequest $request)
    {
        return DataTables::of($this->employee->getForDataTable())
            ->editColumn('name', function ($employee) {
                return $employee->user ? $employee->user->name : 'N/A';
            })
            ->editColumn('status', function ($employee) {
                return $employee->active ? '<label class="badge badge-success" >active</label>' : '<label class="badge badge-danger" >inactive</label>';
            })
            ->editColumn('updated_at', function ($employee) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $employee->updated_at);
            })
            ->addColumn('actions', function ($employee) {
                return $employee->action_buttons;
            })
            ->rawColumns(['name', 'status', 'updated_at', 'actions'])
            ->make(true);
    }
}
