<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
class CreateContaTest extends DuskTestCase
{
    /** @test */
    public function check_if_create_conta_function_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(6))
                    ->visit('/contas/adicionar')
                    ->type('agencia','5432')
                    ->type('banco','Itau')
                    ->type('codigo_banco','19')
                    ->type('tipo_conta','Corrente')
                    ->type('numero_conta','12345')
                    ->select('ativa', 'Sim')
                    ->press('Cadastrar')
                    ->assertPathIs('/contas')
                    ->assertSee('Contas');
        });
    }
}
