<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
class CreateProgramaTest extends DuskTestCase
{
    /** @test */
    public function check_if_create_programa_function_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(11))
                    ->visit('/programa/adicionar')
                    ->type('descricao','Testando adicionar Programa')
                    ->type('valor_beneficio','1800')
                    ->press('Cadastrar')
                    ->assertPathIs('/programa')
                    ->assertSee('Programas');
        });
    }
}
