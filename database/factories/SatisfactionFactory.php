<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Satisfaction>
 */
class SatisfactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'product_id' => rand(1, Product::count()),
            'user_id' => rand(1, User::count()),
            'note' => $this->faker->randomElement(['bad', 'good', 'verygood'])
        ];
    }
}
