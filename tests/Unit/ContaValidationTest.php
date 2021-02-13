<?php

namespace Tests\Unit;

use App\Models\Conta;
use App\Validator\ContaValidator;
use App\Validator\ValidationException;
use phpDocumentor\Reflection\Types\This;
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

    public function testCreateContaSemBanco(){
        $this->expectException(ValidationException::class);
        $conta = Conta::factory()->make(['banco' => '']);
        $dados = $conta->toArray();
        ContaValidator::validate($dados);
    }
    public function testCreateContaSemDados(){
        $this->expectException(ValidationException::class);
        $dados = [];
        ContaValidator::validate($dados);
    }

    public function testCreateConta(){
        $conta = Conta::factory()->make();
        $dados = $conta->toArray();
        ContaValidator::validate($dados);
        Conta::create($dados);
        $this->assertTrue(true);
    }

}
