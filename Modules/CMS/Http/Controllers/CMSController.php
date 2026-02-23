<?php

namespace Modules\CMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\CMS\Entities\CMS;
use Modules\CMS\Http\Requests\ManageCMSRequest;
use Modules\CMS\Http\Requests\CreateCMSRequest;
use Modules\CMS\Http\Requests\UpdateCMSRequest;
use Modules\CMS\Http\Requests\ShowCMSRequest;
use Modules\CMS\Repositories\CMSRepository;

class CMSController extends Controller
{
 /**
     * @var CMSRepository
     * @var CategoryRepository
     */
    protected $cms;

    /**
     * @param CMSRepository $cms
     */
    public function __construct(CMSRepository $cm)
    {
        $this->cms = $cm;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('cms::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('cms::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateCMSRequest $request)
    {
        $this->cms->create($request->except('_token','_method'));
        return redirect()->route('admin.cms.index')->withFlashSuccess(trans('cms::alerts.backend.cms.created'));
    }

    /**
     * @param CMS              $cms
     * @param ManageCMSRequest $request
     *
     * @return mixed
     */
    public function edit(CMS $cm, ManageCMSRequest $request)
    {
        return view('cms::edit')
            ->with('cms',$cm);
    }

    /**
     * @param CMS              $cms
     * @param UpdateCMSRequest $request
     *
     * @return mixed
     */
    public function update(CMS $cm, UpdateCMSRequest $request)
    {
        $this->cms->updateById($cm->id,$request->except('_token','_method'));

        return redirect()->route('admin.cms.index')->withFlashSuccess(trans('cms::alerts.backend.cms.updated'));
    }

    /**
     * @param CMS              $cms
     * @param ManageCMSRequest $request
     *
     * @return mixed
     */
    public function show(CMS $cm, ShowCMSRequest $request)
    {
        return view('cms::show')->with('cms',$cm);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(CMS $cm)
    {
        $this->cms->deleteById($cm->id);

        return redirect()->route('admin.cms.index')->withFlashSuccess(trans('cms::alerts.backend.cms.deleted'));
    }

    public function page($name=null){
        if($name){
            $cms = CMS::where('page',$name)->first();
            return view('frontend.pages.terms',compact('cms'));        
        }
        return redirect()->route('frontend.index');
    }
}
