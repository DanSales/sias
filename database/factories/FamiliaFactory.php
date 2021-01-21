<?php

namespace Database\Factories;

use App\Models\Familia;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamiliaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Familia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => $this->faker->numberBetween(11,11),
            'data_nascimento' => $this->faker->date(),
            'declaracao_autonomo' => $this->faker->file('/home/igor/git/sias/storage/files','/tmp/seeders',true),
            'declaracao_agricultor' => $this->faker->file('/home/igor/git/sias/storage/files','/tmp/seeders',true),
            'escolaridade' => $this->faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
            'renda_mensal' => $this->faker->randomFloat(2,0,1000000),
            'profissao' => $this->faker->jobTitle(),
            'user_id' => $this->faker->numberBetween(1,20)
        ];
    }
}
