<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->paragraph(3),
            'pre_owned' => fake()->boolean(50),
            'price' => fake()->randomFloat(2, 2.99, 99.99),
            'category_id' => fake()->randomNumber(1, 3)
        ];
    }

    // public function preOwned()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'pre_owned' => true
    //         ];
    //     });
    // }

    // versione migliorata del metodo preOwned
    public function preOwned($status = true)
    {
        return $this->state(function (array $attributes) use ($status) {
            return [
                'pre_owned' => $status
            ];
        });
    }

    public function lowPrice()
    {
        return $this->state(function (array $attributes) {

            $price = $attributes['price'];

            if ($attributes['pre_owned'] === true) {
                $price = 0.01;
            }

            return [
                'price' => $price
            ];
        });
    }

    public function customPrice($price)
    {
        return $this->state(function (array $attributes) use ($price) {
            return [
                'price' => $price
            ];
        });
    }
}
