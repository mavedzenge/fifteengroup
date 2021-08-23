<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Contact;
use App\Models\ContactRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'company_id' => Company::inRandomOrder()->first()->id,
            'contact_role_id' => ContactRole::inRandomOrder()->first()->id,
        ];
    }
}