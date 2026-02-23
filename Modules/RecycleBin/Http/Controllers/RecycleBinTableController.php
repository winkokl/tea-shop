<?php

namespace Modules\RecycleBin\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\RecycleBin\Repositories\RecycleBinRepository;
use Modules\RecycleBin\Http\Requests\ManageRecycleBinRequest;

class RecycleBinTableController extends Controller
{
    /**
     * @var RecycleBinRepository
     */
    protected $recyclebin;

    /**
     * @param RecycleBinRepository $recyclebin
     */
    public function __construct(RecycleBinRepository $recyclebin)
    {
        $this->recyclebin = $recyclebin;
    }

    /**
     * @param ManageRecycleBinRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRecycleBinRequest $request)
    {
        return DataTables::of($this->recyclebin->getForDataTable($request->submodule))
            ->addColumn('actions', function ($recyclebin) {
                return $recyclebin->action_buttons;
            })
            ->editColumn('detail', function ($recyclebin) {
                $NamespacedModel = $recyclebin->eloquent;
                $data = $NamespacedModel::onlyTrashed()->find($recyclebin->related_row_id)->toArray();
                return implode(',', $data);
            })
            ->editColumn('updated_at', function ($recyclebin) {
                return $recyclebin->updated_at;
            })
            ->rawColumns(['actions','detail'])
            ->make(true);
    }
}
