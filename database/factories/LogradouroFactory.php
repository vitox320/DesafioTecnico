<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LogradouroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "cep" => $this->faker->postcode(),
            "nome_rua" => $this->faker->streetName(),
            "numero" => $this->faker->randomNumber(2),
            "bairro" => $this->faker->streetAddress(),
            "cidade" => $this->faker->city(),
            "estado" => $this->faker->state(),

        ];
    }
}
