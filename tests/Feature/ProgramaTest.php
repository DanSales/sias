<?php

namespace Tests\Feature;

use App\Models\Beneficiario;
use App\Models\Servidor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Faker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;


class ProgramaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testListPrograma(){
        $servidor = Servidor::factory()->create();
        $user = User::find($servidor->user_id);

        Session::start();

        $credentials = array(
            'username' => $user->email,
            'password' => 'Testing.1234',
            '_token' => csrf_token()
        );

        $this->call('POST', '/login', $credentials);


        $this->actingAs($user)
            ->get('/programa')
            ->assertStatus(200);

    }

    public function testCreatePrograma(){
        $faker = Faker\Factory::create();
        $servidor = Servidor::factory()->create();
        $user = User::find($servidor->user_id);

        Session::start();

        $credentials = array(
            'username' => $user->email,
            'password' => 'Testing.1234',
            '_token' => csrf_token()
        );

        $this->call('POST', '/login', $credentials);

        $conta = [
            '_token' => csrf_token(),
            'valor_beneficio' => '200',
            'descricao' => $faker->lastName(),
        ];

        $this->actingAs($user)
            ->post('/programa/adicionar',$conta)
            ->assertLocation('/programa');
    }

}
