<?php

namespace Modules\AppSetting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\AppSetting\Entities\AppSetting;
use Modules\AppSetting\Http\Requests\ManageAppSettingRequest;
use Modules\AppSetting\Http\Requests\CreateAppSettingRequest;
use Modules\AppSetting\Http\Requests\UpdateAppSettingRequest;
use Modules\AppSetting\Http\Requests\ShowAppSettingRequest;
use Modules\AppSetting\Repositories\AppSettingRepository;

class AppSettingController extends Controller
{
 /**
     * @var AppSettingRepository
     * @var CategoryRepository
     */
    protected $appsetting;

    /**
     * @param AppSettingRepository $appsetting
     */
    public function __construct(AppSettingRepository $appsetting)
    {
        $this->appsetting = $appsetting;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('appsetting::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('appsetting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAppSettingRequest $request)
    {
        $this->appsetting->update($request);
        return redirect()->route('admin.appsetting.index')->withFlashSuccess(trans('appsetting::alerts.backend.appsetting.updated'));
    }

    /**
     * @param AppSetting              $appsetting
     * @param ManageAppSettingRequest $request
     *
     * @return mixed
     */
    public function edit(AppSetting $appsetting, ManageAppSettingRequest $request)
    {
        return view('appsetting::edit')
            ->withAppSetting($appsetting);
    }

    /**
     * @param AppSetting              $appsetting
     * @param UpdateAppSettingRequest $request
     *
     * @return mixed
     */
    public function update(AppSetting $appsetting, UpdateAppSettingRequest $request)
    {
        $this->appsetting->updateById($appsetting->id,$request->except('_token','_method'));

        return redirect()->route('admin.appsetting.index')->withFlashSuccess(trans('appsetting::alerts.backend.appsetting.updated'));
    }

    /**
     * @param AppSetting              $appsetting
     * @param ManageAppSettingRequest $request
     *
     * @return mixed
     */
    public function show(AppSetting $appsetting, ShowAppSettingRequest $request)
    {
        return view('appsetting::show')->withAppSetting($appsetting);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(AppSetting $appsetting)
    {
        $this->appsetting->deleteById($appsetting->id);

        return redirect()->route('admin.appsetting.index')->withFlashSuccess(trans('appsetting::alerts.backend.appsetting.deleted'));
    }
}
