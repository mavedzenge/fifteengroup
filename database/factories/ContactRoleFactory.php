<?php

namespace Database\Factories;

use App\Models\ContactRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactRole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word . '_' . $this->faker->uuid,
        ];
    }
}