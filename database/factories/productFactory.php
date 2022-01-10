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
            'firstname'=>$this->faker->firstname(),
            'title'=>$this->faker->word(),
            'price'=>$this->faker->numberBetween($min=1,$max=1000),
            'Image'=>'slider1.jpg',
        ];
    }
}
