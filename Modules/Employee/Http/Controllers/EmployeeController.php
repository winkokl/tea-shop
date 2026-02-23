<?php

namespace Modules\Employee\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Employee\Entities\Employee;
use Modules\Employee\Http\Requests\ManageEmployeeRequest;
use Modules\Employee\Http\Requests\CreateEmployeeRequest;
use Modules\Employee\Http\Requests\UpdateEmployeeRequest;
use Modules\Employee\Http\Requests\ShowEmployeeRequest;
use Modules\Employee\Repositories\EmployeeRepository;
use App\Domains\Auth\Models\User;

class EmployeeController extends Controller
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageEmployeeRequest $request)
    {
        return view('employee::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageEmployeeRequest $request)
    {
        $users = User::where('is_employee', 1)->get();
        return view('employee::create')->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $input = $request->except('_token', '_method');
        $input['active'] = 1;

        if (isset($input['hire_date'])) {
            $input['hire_date'] = date('Y-m-d', strtotime($input['hire_date']));
        }

        // Update user's is_employee flag
        User::where('id', $input['user_id'])->update(['is_employee' => 1]);

        $this->employee->create($input);
        return redirect()->route('admin.employee.index')->withFlashSuccess(trans('employee::alerts.backend.employee.created'));
    }

    /**
     * @param Employee              $employee
     * @param ManageEmployeeRequest $request
     *
     * @return mixed
     */
    public function edit(Employee $employee, ManageEmployeeRequest $request)
    {
        $users = User::where('is_employee', 1)->get();
        return view('employee::edit')
            ->withEmployee($employee)
            ->withUsers($users);
    }

    /**
     * @param Employee              $employee
     * @param UpdateEmployeeRequest $request
     *
     * @return mixed
     */
    public function update(Employee $employee, UpdateEmployeeRequest $request)
    {
        $input = $request->except('_token', '_method');

        if (isset($input['hire_date'])) {
            $input['hire_date'] = date('Y-m-d', strtotime($input['hire_date']));
        }

        $input['active'] = isset($input['active']) ? $input['active'] : 0;

        try {
            $this->employee->updateById($employee->id, $input);

            return redirect()->route('admin.employee.index')->withFlashSuccess(trans('employee::alerts.backend.employee.updated'));
        } catch (\Exception $e) {
            return redirect()->route('admin.employee.index')->withFlashDanger(trans('Somethings Wrong'));
        }
    }

    /**
     * @param Employee              $employee
     * @param ManageEmployeeRequest $request
     *
     * @return mixed
     */
    public function show(Employee $employee, ShowEmployeeRequest $request)
    {
        return view('employee::show')->withEmployee($employee);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Employee $employee)
    {
        $this->employee->deleteById($employee->id);

        return redirect()->route('admin.employee.index')->withFlashSuccess(trans('employee::alerts.backend.employee.deleted'));
    }
}
