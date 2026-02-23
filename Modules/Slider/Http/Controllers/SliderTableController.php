<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Slider\Repositories\SliderRepository;
use Modules\Slider\Http\Requests\ManageSliderRequest;

class SliderTableController extends Controller
{
    /**
     * @var SliderRepository
     */
    protected $slider;

    /**
     * @param SliderRepository $slider
     */
    public function __construct(SliderRepository $slider)
    {
        $this->slider = $slider;
    }

    /**
     * @param ManageSliderRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSliderRequest $request)
    {
        return DataTables::of($this->slider->getForDataTable())
            ->editColumn('photo', function($slider) {
                if ($slider->photo) {
                    $photoUrl = url('uploads/' . $slider->photo);
                    return '<img src="' . $photoUrl . '" alt="' . $slider->name . '" class="img-thumbnail" width="50">';
                } else {
                    return 'No photo';
                }
            })
            ->editColumn('status', function($slider) {
                if($slider->active){
                    return '<span class="badge badge-success">Active</span>';
                }else{
                    return '<span class="badge badge-danger">In-Active</span>';
                }
            })
            ->addColumn('actions', function ($slider) {
                return $slider->action_buttons;
            })
            ->rawColumns(['actions','photo','status'])
            ->make(true);
    }
}
