<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
class CreateEditalTest extends DuskTestCase
{
    /** @test */
    public function check_if_create_edital_function_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(11))
                    ->visit('/edital/adicionar')
                    ->type('data_edital','23-02-2021')
                    ->type('inicio_inscricao','23-02-2021')
                    ->type('fim_inscricao','15-03-2021')
                    ->attach('arquivo_edital',storage_path('app/public/testing/Anexo I.docx'))
                    ->type('numero_edital','315')
                    ->select('programa_id')
                    ->press('Cadastrar')
                    ->assertPathIs('/edital')
                    ->assertSee('Editais');
        });
    }
}
