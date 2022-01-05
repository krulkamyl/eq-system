<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $countTypes = Type::count();
        return [
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl(640, 480, 'cats', true),
            'id_type' => $this->faker->biasedNumberBetween(1, $countTypes)
        ];
    }
}
