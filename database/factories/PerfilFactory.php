<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nome_perfil" => $this->faker->jobTitle(),
            "descricao" => $this->faker->text(30),


        ];
    }
}
