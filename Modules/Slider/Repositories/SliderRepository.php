<?php

namespace Modules\Slider\Repositories;

use Modules\Slider\Entities\Slider;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SliderRepository.
 */
class SliderRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(Slider $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->get();
    }

    public function createSlider($input){
        $slider = new Slider;
        $slider->name = $input['name'];
        $slider->type = $input['type'];
        $slider->link = $input['link'];
        $slider->description = isset($input['description']) ? $input['description'] : null;
        $photo = $input['photo'];
        $sliderName=uniqid('slider - ').'.'.$photo->extension();
        $slider->photo = \Storage::disk('uploads')->putFileAs('slider',$photo,$sliderName);
        $slider->active = isset($input['active']) ? 1 : 0;
        $slider->save();
        \Log::info('Slider was Created: ' . auth()->user()->name);
        return $slider;
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model
            ->select('*');
    }
}
