<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "first_name" => $this->faker->word,
            "father_name" => $this->faker->word,
            "grandfather_name" => $this->faker->word,
            "family_name" => $this->faker->word,
            "gender" => "male",
            "id_number" => $this->faker->word,
            "social_security_number" => $this->faker->word,
            "phone" => $this->faker->word,
            "email" => $this->faker->word,
            "has_disability" => true,
            "has_driving_license" => true,
        ];
    }
}
