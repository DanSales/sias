<?php

namespace Database\Factories;

use App\Models\Anexo;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnexoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Anexo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'caminho_arquivo' => $this->faker->file('/tmp','/tmp/seeders',true),
            'programa_id' => $this->faker->numberBetween(1,15)
        ];
    }
}
