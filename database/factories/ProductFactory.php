<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->word(),
            'tags'=>'#stair ,#seat',
            'state'=>'accepted',
            'file_size'=>$this->faker->randomNumber(),
            'link_sketshup'=>$this->faker->url(),
            'link_3ds'=>$this->faker->url(),
            'link_collada'=>$this->faker->url(),
            'link_lumion'=>$this->faker->url(),

        ];
    }
}
