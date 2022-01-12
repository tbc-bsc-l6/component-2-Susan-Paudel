<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'producttype' => $this->faker->randomElement(['cd', 'book','game']),
            'mainname' => $this->faker->word(),
            'pdp'=>$this->faker->randomDigit(),
            'firstname'=>$this->faker->name(),
            'title'=>$this->faker->word(),
            'price'=>$this->faker->numberBetween($min=1,$max=300),
            'Image'=>'slider3.jpg',
        ];
    }
}
