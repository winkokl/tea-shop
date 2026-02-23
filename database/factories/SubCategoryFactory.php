<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\SubCategory\Entities\SubCategory;
use Modules\Category\Entities\Category;
use Faker\Generator as Faker;

class SubCategoryFactory extends Factory
{
    protected $model = SubCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
            'name' => $this->faker->word,
            'mm_name' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph,
            'mm_description' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
