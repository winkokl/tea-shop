<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Order\Entities\Order;
use Modules\Customer\Entities\Customer;
use App\Domains\Auth\Models\User;
use Faker\Generator as Faker;

class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();

        return [
                'user_id' => $user->id,
                'order_ref' => $this->faker->unique()->regexify('[A-Z0-9._%+-]+/[A-Z0-9._%+-]+/[A-Z0-9._%+-]+'),
                'payment_method' => $this->faker->randomElement(['credit card', 'paypal', 'bank transfer']),
                'payment_complete' => $this->faker->boolean(),
                'payment_remark' => $this->faker->sentence(),
                'remark' => $this->faker->paragraph(),
                'extra_service_fee' => $this->faker->randomFloat(2, 0, 100),
                'tax_fee' => $this->faker->randomFloat(2, 0, 100),
                'delivery_fee' => $this->faker->randomFloat(2, 0, 1000),
                'delivery_date' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d H:i:s'),
                'delivery_status' => $this->faker->numberBetween(0, 3),
                'all_total_amount' => $this->faker->randomFloat(2, 0, 10000),
                'save_payment_id' => $this->faker->numberBetween(1, 10),
                'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
                'deleted_at' => null,
            ];
    }
}
