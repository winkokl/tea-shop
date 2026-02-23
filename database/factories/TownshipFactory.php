<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Region\Entities\Region;
use Modules\Township\Entities\Township;

class TownshipFactory extends Factory
{
    protected $model = Township::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $region = Region::newFactory()->create();
        return [
            'name' => $this->faker->name(),
            'region_id'=> $region->id,
            'active'=> 1
        ];
    }
}
