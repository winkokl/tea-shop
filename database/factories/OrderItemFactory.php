<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Order\Entities\OrderItem;
use Modules\Order\Entities\Order;
use Modules\Product\Entities\Product;

use Faker\Generator as Faker;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            //
            'order_id' => function () {
                        return Order::factory()->create()->id;
                    },
            'product_id' => function () {
                        return Product::factory()->create()->id;
                    },
            'quantity' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->optional()->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
