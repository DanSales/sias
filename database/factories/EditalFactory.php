<?php

namespace Database\Factories;

use App\Models\Edital;
use Illuminate\Database\Eloquent\Factories\Factory;

class EditalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Edital::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data_edital' => $this->faker->date(),
            'numero_edital' => $this->faker->numberBetween(1,1000),
            'arquivo_edital' => $this->faker->file('/tmp','/tmp/seeders',true),
            'programa_id' => $this->faker->numberBetween(1,15),
        ];
    }
}
