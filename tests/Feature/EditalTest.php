<?php

namespace Tests\Feature;

use App\Models\Beneficiario;
use App\Models\Candidato;
use App\Models\Servidor;
use App\Models\User;
use Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\assertFileExists;

class EditalTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testListBeneficiarioEditalSucesso(){
        $beneficiario1 = Beneficiario::factory()->create();
        $user2 = User::find($beneficiario1->user_id);

        $this->actingAs($user2)
            ->get('/edital/')
            ->assertStatus(200);
    }

    public function testListServidorEditalSucesso(){
        $servidor = Servidor::factory()->create();
        $user2 = User::find($servidor->user_id);

        $this->actingAs($user2)
            ->get('/edital/')
            ->assertStatus(200);
    }

    public function testListCandidatoEditalSucesso(){
        $candidato = Candidato::factory()->create();
        $user2 = User::find($candidato->user_id);

        $this->actingAs($user2)
            ->get('/edital/')
            ->assertStatus(200);
    }

    public function testServidorCreateEdital(){
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

        Storage::fake('local');
        $file = UploadedFile::fake()->create('file.pdf');

        $edital = [
            'arquivo_edital'=> $file,
            'numero_edital' => $faker->numberBetween(),
            'data_edital' => $faker->date(),
            'programa_id' => 2,
            'inicio_inscricao' =>$faker->date(),
            'fim_inscricao'=> $faker->date(),
            '_token' => csrf_token()
        ];

        $this->actingAs($user)
            ->post('/edital/adicionar',$edital)
            ->assertLocation('/edital');
    }
}
