<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Region\Entities\Region;

class RegionFactory extends Factory
{
    protected $model = Region::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'active'=> 1
        ];
    }
}
