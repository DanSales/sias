<?php

namespace Database\Factories;

use App\Models\Saude;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaudeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Saude::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'despesa_mensal' =>$this->faker->randomFloat(2,0,100000),
            'flag_plano' => $this->faker->boolean(),
            'flag_doenca' => $this->faker->boolean(),
            'flag_dificuldade' => $this->faker->boolean(),
            'flag_deficiencia' => $this->faker->boolean(),
            'valor_plano' =>$this->faker->randomFloat(2,0,100000),
            'familia_id' =>$this->faker->unique(true)->numberBetween(1,80),
        ];
    }
}
