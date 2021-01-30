<?php

namespace Tests\Feature;

use Database\Factories\BeneficiarioFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Beneficiario;
use App\Models\User;

class BeneficiarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testCreateViewBeneficiario(){
        $user = User::factory()->create(['tipo_usuario' => 3]);

        $this->actingAs($user)
            ->get('/beneficiarios/adicionar')
            ->assertStatus(200);
    }
    public function testCreateBeneficiario(){
        $beneficiario = Beneficiario::factory()->create();

        $user = User::factory()->create(['tipo_usuario' => 3]);

        $userCreate = User::factory()->create(['tipo_usuario' => 2]);

        $this->actingAs($user)
            ->get('/beneficiarios/adicionar/'.$userCreate->id)
            ->assertLocation('/beneficiarios');
    }

    public function testListErrorBeneficiario(){
        $beneficiario = Beneficiario::factory()->create();

        $user = User::where('id','=',$beneficiario->user_id)->first();

        $this->actingAs($user)
            ->get('/beneficiarios')
            ->assertStatus(403);
    }






}
