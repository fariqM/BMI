<?php

namespace Database\Factories;

use App\Models\Fruit;
use Illuminate\Database\Eloquent\Factories\Factory;

class FruitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fruit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(16),
            'varian' => $this->faker->text(16),
            'latin_name' => $this->faker->text(16),
            'origin' => $this->faker->country,
            'year_found' => $this->faker->year(2020),
        ];
    }
}
