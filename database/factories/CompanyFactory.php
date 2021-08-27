<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\CompanyStatus;
use App\Models\CompanyType;
use App\Models\Contact;
use App\Models\ContactRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company . " (TA " . $this->faker->numberBetween(1, 10000) . ")",
            'company_type_id' => CompanyType::inRandomOrder()->first()->id,
            'company_status_id' => CompanyStatus::inRandomOrder()->first()->id,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure(): CompanyFactory
    {
        return $this->afterCreating(function (Company $company) {
            $randomNumber = $this->faker->numberBetween(1, 3);
            Contact::factory($randomNumber)->create([
                'company_id' => $company->id,
                'contact_role_id' => ContactRole::inRandomOrder()->first()->id
            ]);
        });
    }
}
