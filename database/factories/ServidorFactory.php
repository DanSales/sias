<?php

namespace Database\Factories;

use App\Models\Servidor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServidorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Servidor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function(){
                return self::factoryForModel('User')->create(['tipo_usuario' => 3])->id;
            }
        ];
    }
}
