<?php

namespace Database\Factories;

use App\Models\Conta;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'agencia' => $this->faker->numberBetween(100),
            'banco' => $this->faker->unique(true)->company(),
            'codigo_banco' => $this->faker->numberBetween(1,1000),
            'tipo_conta' =>$this->faker->numberBetween(1,2),
            'numero_conta' => $this->faker->bankAccountNumber(),
            'ativa' => $this->faker->boolean(),
            'beneficiario_id' => function(){
                return self::factoryForModel('Beneficiario')->create()->id;
            },
        ];
    }
}
