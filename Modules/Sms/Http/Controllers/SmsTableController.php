<?php

namespace Modules\Sms\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Sms\Repositories\SmsRepository;
use Modules\Sms\Http\Requests\ManageSmsRequest;

class SmsTableController extends Controller
{
    /**
     * @var SmsRepository
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
     * @param ManageSmsRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSmsRequest $request)
    {
        return DataTables::of($this->sms->getForDataTable())
            ->addColumn('content', function ($sms) {
                return strip_tags($sms->content);
            })
            ->addColumn('actions', function ($sms) {
                return $sms->action_buttons;
            })
            ->rawColumns(['actions','content'])
            ->make(true);
    }
}
