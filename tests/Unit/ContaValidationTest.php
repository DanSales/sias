<?php

namespace Tests\Unit;

use App\Models\Conta;
use App\Validator\ContaValidator;
use App\Validator\ValidationException;
use Tests\TestCase;

class ContaValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function testCreateContaSemAgencia(){
        $this->expectException(ValidationException::class);
        $conta = Conta::factory()->make(['agencia' => '']);
        $dados = $conta->toArray();
        ContaValidator::validate($dados);
    }
}
