<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$tive4vPDzIq02SVERWxkYOAeXeaToAv57KQeF1kXXU7nogh60fYO2', // Testing.1234
            'remember_token' => Str::random(10),
            'nome_completo' => $this->faker->name(),
            'cpf' =>$this->faker->numberBetween(11,11),
            'data_nascimento' =>$this->faker->date(),
            'endereco' =>$this->faker->address(),
            'tipo_usuario' => $this->faker->numberBetween(1,3)
        ];
    }
}
