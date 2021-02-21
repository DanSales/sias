<?php

namespace Database\Factories;

use App\Models\EditalUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class EditalUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EditalUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function(){
                $candidato = self::factoryForModel('Candidato')->create();
                return $candidato->user_id;
            },
            'edital_id' => function(){
                return self::factoryForModel('Edital')->create()->id;
            },
            'relato_familiar' => $this->faker->file('/tmp',storage_path('app/public/editais/faker'),false),
            'declaracao_rendimento' => $this->faker->file('/tmp',storage_path('app/public/editais/faker'),false),
            'is_beneficiario' => false,
            'is_ativo' => false,
        ];
    }
}
