<?php

namespace Database\Factories;

use App\Models\OutrasInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class OutrasInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OutrasInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'atividade' => $this->faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
            'renda' => $this->faker->randomFloat(2,0,100000),
            'familia_id' => $this->faker->numberBetween(1,80),

        ];
    }
}
