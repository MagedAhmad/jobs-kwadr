<?php

namespace Database\Factories;

use App\Models\JobField;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobField::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word,
        ];
    }
}
