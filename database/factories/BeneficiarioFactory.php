<?php

namespace Database\Factories;

use App\Models\Beneficiario;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeneficiarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beneficiario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function(){
                $user = self::factoryForModel('User')->create(['tipo_usuario' => 2]);
                $candidato = self::factoryForModel('Candidato')->create(['user_id' => $user->id]);

                for($i = 0; $i < 5; $i++){
                    $familiar = self::factoryForModel('Familia')->create(['user_id' => $user->id]);
                    self::factoryForModel('Saude')->create(['familia_id'=>$familiar->id]);
                }

                $editalUser = self::factoryForModel('EditalUser')->create(
                    [
                        'user_id' => $user->id,
                        'is_beneficiario' => true,
                        'is_ativo' => true
                    ]);

                $idsFamiliares = [];
                foreach ($user->familias as $f){
                    $idsFamiliares[] = $f->id;
                }

                $editalUser->familias()->attach($idsFamiliares);

                return $user->id;
            }
        ];
    }
}
