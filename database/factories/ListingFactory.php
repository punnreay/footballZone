<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fieldName' => $this->faker->sentence(),
            'phone' => '123456789',
            'location' => $this->faker->city(),
            'map' => $this->faker->url(),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
