<?php

namespace Database\Factories;

use App\Models\Candidato;
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
            'relato_familiar' => $this->faker->file('/home/igor/git/sias/storage/files','/tmp/seeders',true),
            'declaracao_rendimento' => $this->faker->file('/home/igor/git/sias/storage/files','/tmp/seeders',true),
            'user_id' => $this->faker->unique(true)->numberBetween(1,20),
        ];
    }
}
