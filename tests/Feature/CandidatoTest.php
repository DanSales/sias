<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Faker;
use Tests\TestCase;
use App\Models\Candidato;
use App\Models\User;

class CandidatoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testCandidatoErroRegister(){
        $faker = Faker\Factory::create();
        $this->get('/register');
        $form = [
            '_token' => csrf_token(),
            'nome_completo' => '',
            'cpf' => $faker->numberBetween(10000000000,99999999999),
            'data_nascimento' => $faker->date('d/m/yy'),
            'endereco' => $faker->streetAddress,
            'email' => $faker->email,
            'password' => 'Testing.1234',
            'password-confirm' =>'Testing.1234',
        ];


        $response = $this->post('/register', $form)
            ->assertLocation('/register');

    }

    public function testCandidadoViewPrograma(){
        $candidato = Candidato::factory()->create();
        $user = User::find($candidato->user_id);

        $this->actingAs($user)
            ->get('/programa')
            ->assertStatus(200);
    }
}
