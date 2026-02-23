<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\SubCategory\Entities\SubCategory;
use Modules\Brand\Entities\Brand;
use Modules\Vendor\Entities\Vendor;
use Modules\ProductLabel\Entities\ProductLabel;
use Modules\ProductType\Entities\ProductType;

class ProductFactory extends Factory
{
    protected $model = Product::class;
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
            'sub_category_id' => function () {
                return SubCategory::factory()->create()->id;
            },
            'brand_id' => function () {
                return Brand::factory()->create()->id;
            },
            'vendor_id' => function () {
                return Vendor::newFactory()->create()->id;
            },
            'name' => $this->faker->word,
            'mm_name' => $this->faker->word,
            'product_label_id' => function () {
                return ProductLabel::factory()->create()->id;
            },
            'slug' => $this->faker->unique()->slug,
            'product_code' => $this->faker->unique()->ean8,
            'description' => $this->faker->optional()->paragraph(),
            'mm_description' => $this->faker->optional()->paragraph(),
            'original_price' => $this->faker->randomFloat(2, 10, 100),
            'selling_price' => $this->faker->randomFloat(2, 10, 100),
            'wholesale_price' => $this->faker->randomFloat(2, 10, 100),
            'total_quantity' => $this->faker->numberBetween(1, 100),
            'remark' => $this->faker->optional()->sentence(),
            'active' => $this->faker->boolean,
            'show_price' => $this->faker->randomFloat(2, 10, 100),
            'product_type_id' => function () {
                return ProductType::factory()->create()->id;
            },
        ];
    }
}
