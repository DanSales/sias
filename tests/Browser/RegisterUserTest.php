<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterUserTest extends DuskTestCase
{
    /** @test */
    public function check_if_register_function_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('nome_completo','Daniel Henrique Sales')
                    ->type('cpf','12345678912')
                    ->type('data_nascimento','24-10-1999')
                    ->type('endereco','Avenida Goncalves Maia')
                    ->type('email','testing@teste.com')
                    ->type('password','12345678')
                    ->type('password_confirmation','12345678')
                    ->press('Register')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard');
        });
    }
    /** @test */
    public function check_if_login_function_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email','testing@teste.com')
                    ->type('password','12345678')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard');
        });
    }
}
