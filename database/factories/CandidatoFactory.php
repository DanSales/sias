<?php

namespace Database\Factories;

use App\Models\Candidato;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'relato_familiar' => $this->faker->file('/tmp',storage_path('app/public/inscricao/faker'),false),
            'declaracao_rendimento' => $this->faker->file('/tmp',storage_path('app/public/inscricao/faker'),false),
            'user_id' => function(){
                $idUser = self::factoryForModel('User')->create(['tipo_usuario' => 1])->id;
                for($i = 0; $i < 5; $i++){
                    $familiar = self::factoryForModel('Familia')->create(['user_id' => $idUser]);
                    self::factoryForModel('Saude')->create(['familia_id'=>$familiar->id]);
                }

                return $idUser;

            }
        ];
    }
}
