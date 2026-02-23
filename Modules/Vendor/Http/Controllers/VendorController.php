<?php

namespace Modules\Vendor\Http\Controllers;

use App\Domains\Auth\Services\UserService;
use GMBF\MyanmarPhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Region\Entities\Region;
use Modules\Vendor\Entities\Vendor;
use Modules\Vendor\Http\Requests\ManageVendorRequest;
use Modules\Vendor\Http\Requests\CreateVendorRequest;
use Modules\Vendor\Http\Requests\UpdateVendorRequest;
use Modules\Vendor\Http\Requests\ShowVendorRequest;
use Modules\Vendor\Repositories\VendorRepository;
use Modules\Township\Entities\Township;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
 /**
     * @var VendorRepository
     * @var CategoryRepository
     */
    protected $vendor;
    protected $userService;

    /**
     * @param VendorRepository $vendor
     */
    public function __construct(VendorRepository $vendor, UserService $userService)
    {
        $this->vendor = $vendor;
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageVendorRequest $request)
    {
        $routeName = 'admin.vendor.get';
        return view('vendor::index',compact('routeName'));
    }

    public function deletedIndex(ManageVendorRequest $request)
    {
        $routeName = 'admin.deleted.vendor.get';
        return view('vendor::index',compact('routeName'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageVendorRequest $request)
    {
        $regions = Region::all();
        return view('vendor::create')->with('regions',$regions);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateVendorRequest $request)
    {
        $input = $request->except('_token', '_method');
        $phoneNumber = new MyanmarPhoneNumber();
        $input['mobile'] = $phoneNumber->add_prefix($input['mobile']);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $vendor = uniqid('vendor - ').'.'.$logo->extension();
            $logoPath = \Storage::disk('uploads')->putFileAs('vendor',$logo,$vendor);
            $input['logo'] = $logoPath;
        }

        if ($request->hasFile('shop_photo')) {
            $shopPhoto = $request->file('shop_photo');
            $vendor = uniqid('shop - ').'.'.$shopPhoto->extension();
            $shopPhotoPath = \Storage::disk('uploads')->putFileAs('shop',$shopPhoto,$vendor);
            $input['shop_photo'] = $shopPhotoPath;
        }
        $input['delivery'] = isset($input['delivery']) ? 1 : 0;
        $user = $this->userService->store([
            'type' => "admin",
            'name' => $input['name'],
            'email' => $input['email'],
            'mobile' => $input['mobile'],
            'password' => $input['password'],
            'active' => isset($input['active']) ? 1 : 0,
            'confirmed' => isset($input['confirmed']) ? 1 : 0,
            'is_vendor' => 1,
            'date_of_birth' => null,
            'roles' => [0 => 'vendor'],
        ]);
        $input['user_id'] = $user->id;
        $input['nrc']     = explode('/',@$request->nrc_code)[0].'/'.@$request->nrc_city_name.@$request->nrc_type.@$request->nrc_code_number;
        $this->vendor->create($input);
        return redirect()->route('admin.vendor.index')->withFlashSuccess(trans('vendor::alerts.backend.vendor.created'));
    }

    /**
     * @param Vendor              $vendor
     * @param ManageVendorRequest $request
     *
     * @return mixed
     */
    public function edit(Vendor $vendor, ManageVendorRequest $request)
    {
        $regions    = Region::all()->pluck('name','id');
        $townships = Township::all()->pluck('name','id');
        return view('vendor::edit',compact('vendor','regions','townships'));
    }

    /**
     * @param Vendor              $vendor
     * @param UpdateVendorRequest $request
     *
     * @return mixed
     */
    public function update(Vendor $vendor, UpdateVendorRequest $request)
    {
        $input = $request->except('_token','_method');
        try {
                $vendor->user->update(['name'=>$request->name , 'email' => isset($request->email) ? $request->email : null, 'mobile' => $request->mobile]);
                
                if ($request->hasFile('logo')) {
                    Storage::disk('uploads')->delete($vendor->logo);

                    $logo = $request->file('logo');
                    $image = uniqid('vendor - ').'.'.$logo->extension();
                    $logoPath = \Storage::disk('uploads')->putFileAs('vendor',$logo,$image);
                    $input['logo'] = $logoPath;
                }

                if ($request->hasFile('shop_photo')) {
                    Storage::disk('uploads')->delete($vendor->shop_photo);

                    $shopPhoto = $request->file('shop_photo');
                    $image = uniqid('shop - ').'.'.$shopPhoto->extension();
                    $shopPhotoPath = \Storage::disk('uploads')->putFileAs('shop',$shopPhoto,$image);
                    $input['shop_photo'] = $shopPhotoPath;
                }

                $vendor->user->update(['name'=>$request->name , 'email' => $request->email, 'mobile' => $request->mobile]);
                $this->vendor->updateById($vendor->id,$input);

                return redirect()->route('admin.vendor.index')->withFlashSuccess(trans('vendor::alerts.backend.vendor.updated'));

        } catch (\Exception $e) {
            return redirect()->route('admin.vendor.index')->withFlashDanger(trans('Somethings Wrong'));
        }
    }

    /**
     * @param Vendor              $vendor
     * @param ManageVendorRequest $request
     *
     * @return mixed
     */
    public function show(Vendor $vendor, ShowVendorRequest $request)
    {
        return view('vendor::show')->withVendor($vendor);
    }

    /**
     * 
     *
     * @return mixed
     */
    public function restore($id)
    {
        $vendor = Vendor::withTrashed()->find($id);
        
        if ($vendor) {
                $vendor->restore();
                \Log::info('Vendor '. $vendor->name .' restored by '.auth()->user()->name);
                return redirect()->route('admin.vendor.index')->withFlashSuccess(__('vendor::alerts.backend.vendor.restored'));
            }
    }
    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Vendor $vendor)
    {
        if ($this->userService->mark($vendor->user, 0)){
            $this->vendor->deleteById($vendor->id);
        }

        return redirect()->route('admin.vendor.index')->withFlashSuccess(trans('vendor::alerts.backend.vendor.deleted'));
    }

    public function importShow(Request $request)
    {
        return view('vendor::import');
    }

    public function import(Request $request)
    {
        dd('hello');
    }

    public function downloadSampleCSV()
    {
        $columnOrder = ["Name", "NRC","Mobile No", "Code", "Region/State", "Township", "Active", "Confirmed"];

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
        foreach ($sampleData as $row) {
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
