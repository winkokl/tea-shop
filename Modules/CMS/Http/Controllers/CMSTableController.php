<?php

namespace Modules\CMS\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\CMS\Repositories\CMSRepository;
use Modules\CMS\Http\Requests\ManageCMSRequest;

class CMSTableController extends Controller
{
    /**
     * @var CMSRepository
     */
    protected $cms;

    /**
     * @param CMSRepository $cms
     */
    public function __construct(CMSRepository $cms)
    {
        $this->cms = $cms;
    }

    /**
     * @param ManageCMSRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCMSRequest $request)
    {
        return DataTables::of($this->cms->getForDataTable())
            ->addColumn('actions', function ($cms) {
                return $cms->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
