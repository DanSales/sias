<?php

namespace Database\Factories;

use App\Models\Bolsa;
use Illuminate\Database\Eloquent\Factories\Factory;

class BolsaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bolsa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data_pagamento' => $this->faker->date(),
            'conta_id' => function(){
                return self::factoryForModel('Conta')->create()->id;
            },
        ];
    }
}
