<?php

namespace Tests\Feature;

use App\Models\Servidor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Beneficiario;
use App\Models\Candidato;
use App\Models\Conta;
use Illuminate\Support\Facades\Session;

class ContaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testListContaSucesso(){
        $beneficiario1 = Beneficiario::factory()->create();
        $user2 = User::find($beneficiario1->user_id);

        $conta = Conta::factory()->create(['beneficiario_id' => $beneficiario1->id]);

        $this->actingAs($user2)
            ->get('/contas/')
            ->assertStatus(200);
    }

    public function testErroListConta(){
        $candidato = Candidato::factory()->create();
        $user2 = User::find($candidato->user_id);

        $this->actingAs($user2)
            ->get('/contas/')
            ->assertStatus(403);
    }

    public function testCreateConta(){
        $beneficiario = Beneficiario::factory()->create();
        $user = User::find($beneficiario->user_id);

        Session::start();

        $credentials = array(
            'username' => $user->email,
            'password' => 'Testing.1234',
            '_token' => csrf_token()
        );

        $this->call('POST', '/login', $credentials);

        $conta = ['agencia' => '0011',
                    'banco' => 'teste',
                    'codigo_banco' => '001',
                    'tipo_conta' => 'CC',
                    'numero_conta' => '1010',
                    'ativa' => false,
                    'beneficiario_id' => $beneficiario->id,
                    '_token' => csrf_token()];

        $this->actingAs($user)
            ->post('/contas/adicionar',$conta)
            ->assertLocation('/contas');
    }

    public function testCadidatoCreateConta(){

        $candidato = Candidato::factory()->create();
        $user = User::find($candidato->user_id);

        Session::start();

        $credentials = array(
            'username' => $user->email,
            'password' => 'Testing.1234',
            '_token' => csrf_token()
        );

        $this->call('POST', '/login', $credentials);

        $conta = ['agencia' => '0011',
            'banco' => 'teste',
            'codigo_banco' => '001',
            'tipo_conta' => 'CC',
            'numero_conta' => '1010',
            'ativa' => false,
            'beneficiario_id' => $candidato->id,
            '_token' => csrf_token()];

        //dd($conta);

        $this->actingAs($user)
            ->post('/contas/adicionar',$conta)
            ->assertStatus(403);
    }

    public function testCreateContaSemFilds(){
        $beneficiario = Beneficiario::factory()->create();
        $user = User::find($beneficiario->user_id);

        Session::start();

        $credentials = array(
            'username' => $user->email,
            'password' => 'Testing.1234',
            '_token' => csrf_token()
        );

        $this->call('POST', '/login', $credentials);

        $conta = ['agencia' => '',
            'banco' => '',
            'codigo_banco' => '001',
            'tipo_conta' => 'CC',
            'numero_conta' => '1010',
            'ativa' => false,
            'beneficiario_id' => $beneficiario->id,
            '_token' => csrf_token()];

        $this->actingAs($user)
            ->post('/contas/adicionar',$conta)
            ->assertLocation('/contas/adicionar');
    }

}
