<?php

namespace Modules\Sms\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Sms\Entities\Sms;
use Modules\Sms\Http\Requests\ManageSmsRequest;
use Modules\Sms\Http\Requests\CreateSmsRequest;
use Modules\Sms\Http\Requests\UpdateSmsRequest;
use Modules\Sms\Http\Requests\ShowSmsRequest;
use Modules\Sms\Repositories\SmsRepository;

class SmsController extends Controller
{
 /**
     * @var SmsRepository
     * @var CategoryRepository
     */
    protected $sms;

    /**
     * @param SmsRepository $sms
     */
    public function __construct(SmsRepository $sms)
    {
        $this->sms = $sms;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageSmsRequest $request)
    {
        return view('sms::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageSmsRequest $request)
    {
        return view('sms::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateSmsRequest $request)
    {
        $this->sms->create($request->except('_token','_method'));
        return redirect()->route('admin.sms.index')->withFlashSuccess(trans('sms::alerts.backend.sms.created'));
    }

    /**
     * @param Sms              $sms
     * @param ManageSmsRequest $request
     *
     * @return mixed
     */
    public function edit(Sms $sms, ManageSmsRequest $request)
    {
        return view('sms::edit')
            ->withSms($sms);
    }

    /**
     * @param Sms              $sms
     * @param UpdateSmsRequest $request
     *
     * @return mixed
     */
    public function update(Sms $sms, UpdateSmsRequest $request)
    {
        $this->sms->updateById($sms->id,$request->except('_token','_method'));

        return redirect()->route('admin.sms.index')->withFlashSuccess(trans('sms::alerts.backend.sms.updated'));
    }

    /**
     * @param Sms              $sms
     * @param ManageSmsRequest $request
     *
     * @return mixed
     */
    public function show(Sms $sms, ShowSmsRequest $request)
    {
        return view('sms::show')->withSms($sms);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Sms $sms)
    {
        $this->sms->deleteById($sms->id);

        return redirect()->route('admin.sms.index')->withFlashSuccess(trans('sms::alerts.backend.sms.deleted'));
    }
}
