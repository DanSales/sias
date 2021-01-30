<?php

namespace Tests\Feature;

use App\Models\Conta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Beneficiario;
use App\Models\User;


class BolsaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testListBolsaOtherBeneficiario(){
        $beneficiario1 = Beneficiario::factory()->create();
        $beneficiario2 = Beneficiario::factory()->create();
        $user2 = User::find($beneficiario2->user_id);

        $conta = Conta::factory()->create(['beneficiario_id' => $beneficiario1->id]);

        $this->actingAs($user2)
            ->get('/contas/'.$conta->id.'/bolsas')
            ->assertStatus(403);
    }

    public function testListBolsasBeneficiario(){
        $beneficiario1 = Beneficiario::factory()->create();

        $conta = Conta::factory()->create(['beneficiario_id' => $beneficiario1->id]);

        $user2 = User::find($beneficiario1->user_id);

        $this->actingAs($user2)
            ->get('/contas/'.$conta->id.'/bolsas')
            ->assertStatus(200);
    }


}
