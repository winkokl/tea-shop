<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use GMBF\MyanmarPhoneNumber;

use Modules\Customer\Entities\Customer;
use Modules\Customer\Http\Requests\ManageCustomerRequest;
use Modules\Customer\Http\Requests\CreateCustomerRequest;
use Modules\Customer\Http\Requests\UpdateCustomerRequest;
use Modules\Customer\Http\Requests\ShowCustomerRequest;
use Modules\Customer\Repositories\CustomerRepository;

class CustomerController extends Controller
{
 /**
     * @var CustomerRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageCustomerRequest $request)
    {
        return view('customer::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageCustomerRequest $request)
    {
        return view('customer::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateCustomerRequest $request)
    {
        $input = $request->except('_token', '_method');
        $phoneNumber = new MyanmarPhoneNumber();
        $input['mobile_no'] = $phoneNumber->add_prefix($input['mobile_no']);
        $input['start_date']= date('Y-m-d', strtotime($input['start_date']));
        $input['end_date']  = date('Y-m-d', strtotime($input['end_date']));
        $input['active']    = 1;
// dd($input);
        $this->customer->create($input);
        return redirect()->route('admin.customer.index')->withFlashSuccess(trans('customer::alerts.backend.customer.created'));
    }

    /**
     * @param Customer              $customer
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     */
    public function edit(Customer $customer, ManageCustomerRequest $request)
    {
        return view('customer::edit')
            ->withCustomer($customer);
    }

    /**
     * @param Customer              $customer
     * @param UpdateCustomerRequest $request
     *
     * @return mixed
     */
    public function update(Customer $customer, UpdateCustomerRequest $request)
    {
        $input = $request->except('_token','_method');
        $input['start_date']= date('Y-m-d', strtotime($input['start_date']));
        $input['end_date']  = date('Y-m-d', strtotime($input['end_date']));
        $input['active']    = $input['active_no'];
        
        try {
                $this->customer->updateById($customer->id,$input);

                return redirect()->route('admin.customer.index')->withFlashSuccess(trans('customer::alerts.backend.customer.updated'));

        } catch (\Exception $e) {
            return redirect()->route('admin.customer.index')->withFlashDanger(trans('Somethings Wrong'));
        }
    }

    /**
     * @param Customer              $customer
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     */
    public function show(Customer $customer, ShowCustomerRequest $request)
    {
        return view('customer::show')->withCustomer($customer);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Customer $customer)
    {
        $this->customer->deleteById($customer->id);

        return redirect()->route('admin.customer.index')->withFlashSuccess(trans('customer::alerts.backend.customer.deleted'));
    }

    public function export(Request $request, Customer $customer) 
    {
        $customers = $this->customer->getAll();
        $columnOrder = ["Name", "Mobile No", "Code", "Start Date", "End Date", "Active"];
        $array = [];
        foreach ($customers as $cus) {
            $arr['name']      = $cus->name;
            $arr['phone']     = $cus->mobile_no;
            $arr['code']      = $cus->code;
            $arr['start_date']= $cus->start_date;
            $arr['end_date']  = $cus->end_date;
            $arr['status']    = $cus->active;
            array_push($array, $arr);
        }
        // dd($array);
        $sampleData = [
            ["Test1", "1/KHABADA(N)101023","0925344441", "GGGGG", "Yangon", "Dala", "1", "1"],
            ["Test2", "1/KHABADA(N)101023","0925344442", "YYYY", "Mandalay", "Chan Mya", "1", "1"],
            ["Test3", "1/KHABADA(N)101023","0925344443", "hhhhh", "Naypyitaw", "Thar Si", "1", "1"],
            // Add more rows as needed
        ];

        // Define the CSV file name
        $filename = "sample.csv";

        // Create a new file in the storage directory
        $path = storage_path('app/' . $filename);
        $file = fopen($path, 'w');

        // Write the first line with column names
        fputcsv($file, $columnOrder);

        // Write the sample data rows
        foreach ($array as $row) {
            fputcsv($file, $row);
        }

        // Close the file
        fclose($file);

        // Prepare the response to download the file
        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return \Illuminate\Support\Facades\Response::download($path, $filename, $headers);
    }
}
