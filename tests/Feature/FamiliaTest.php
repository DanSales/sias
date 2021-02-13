<?php

namespace Tests\Feature;

use App\Models\Candidato;
use App\Models\User;
use Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FamiliaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void

    public function testCandidatoCreateFamiliar(){
        $faker = Faker\Factory::create();
        $candidato = Candidato::factory()->create();
        $user = User::find($candidato->user_id);

        Session::start();

        $credentials = array(
            'username' => $user->email,
            'password' => 'Testing.1234',
            '_token' => csrf_token()
        );

        $this->call('POST', '/login', $credentials);

        Storage::fake('local');
        $file = UploadedFile::fake()->create('file.pdf');

        $familiar = [
            'cpf' => '11111111111',
            'data_nascimento' => $faker->date(),
            'declaracao_autonomo' => $file,
            'declaracao_agricultor' => $file,
            'escolaridade' => 'Superior',
            'renda_mensal' => 1221,
            'profissao' => 'Professor',
            '_token' => csrf_token(),
        ];

        $this->actingAs($user)
            ->post('/familias/adicionar',$familiar)
            ->assertLocation('/familias');
    }*/
}
