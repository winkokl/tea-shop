<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Slider\Entities\Slider;
use Modules\Slider\Enum\SliderType;
use Modules\Slider\Http\Requests\ManageSliderRequest;
use Modules\Slider\Http\Requests\CreateSliderRequest;
use Modules\Slider\Http\Requests\UpdateSliderRequest;
use Modules\Slider\Http\Requests\ShowSliderRequest;
use Modules\Slider\Repositories\SliderRepository;

class SliderController extends Controller
{
 /**
     * @var SliderRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageSliderRequest $request)
    {
        return view('slider::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageSliderRequest $request)
    {
        $sliderType = SliderType::AVAILABLES;
        return view('slider::create',compact('sliderType'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateSliderRequest $request)
    {
        $this->slider->createSlider($request->except('_token','_method'));
        return redirect()->route('admin.slider.index')->withFlashSuccess(trans('slider::alerts.backend.slider.created'));
    }

    /**
     * @param Slider              $slider
     * @param ManageSliderRequest $request
     *
     * @return mixed
     */
    public function edit(Slider $slider, ManageSliderRequest $request)
    {
        $sliderType = SliderType::AVAILABLES;
        return view('slider::edit',compact('sliderType'))
            ->withSlider($slider);
    }

    /**
     * @param Slider              $slider
     * @param UpdateSliderRequest $request
     *
     * @return mixed
     */
    public function update(Slider $slider, UpdateSliderRequest $request)
    {
        $existingPhoto = $slider->photo; 
        $slider->name = $request['name'];
        $slider->link = $request['link'];
        $slider->type = $request['type'];
        $slider->description = isset($request['description']) ? $request['description'] : null;
        if (isset($request['photo']) && $request['photo'] != null) {
            if (!empty($existingPhoto)) {
                \Storage::disk('uploads')->delete($existingPhoto);
            }

            $sliderName = uniqid('slider - ').'.'.$request['photo']->extension();
            $slider->photo = \Storage::disk('uploads')->putFileAs('product-item', $request['photo'], $sliderName);
        }
        $slider->active = isset($request['active']) ? 1 : 0;
        $slider->save();

        return redirect()->route('admin.slider.index')->withFlashSuccess(trans('slider::alerts.backend.slider.updated'));
    }

    /**
     * @param Slider              $slider
     * @param ManageSliderRequest $request
     *
     * @return mixed
     */
    public function show(Slider $slider, ShowSliderRequest $request)
    {
        return view('slider::show')->withSlider($slider);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Slider $slider)
    {
        $this->slider->deleteById($slider->id);

        return redirect()->route('admin.slider.index')->withFlashSuccess(trans('slider::alerts.backend.slider.deleted'));
    }
}
