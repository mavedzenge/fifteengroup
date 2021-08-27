<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'contact_id' => Contact::inRandomOrder()->first()->id,
        ];
    }

    /**
     * Configure the model factory.
     *>
     * @return $this
     */
    public function configure(): OrderFactory
    {
        return $this->afterCreating(function (Order $order) {
            $randomNumber = $this->faker->numberBetween(1, 3);
            OrderItem::factory($randomNumber)->create([
                'order_id' => $order->id,
                'product_name' => $this->faker->name,
                'price' => $this->faker->numerify
            ]);
        });
    }
}
