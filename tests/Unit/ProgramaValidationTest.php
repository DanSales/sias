<?php

namespace Tests\Unit;

use App\Models\Programa;
use App\Validator\ProgramaValidator;
use App\Validator\ValidationException;
use Tests\TestCase;

class ProgramaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateProgramaSemDados(){
        $this->expectException(ValidationException::class);
        $dados = [];
        ProgramaValidator::validate($dados);
    }

    public function testCreateProgramaSemDescricao(){
        $this->expectException(ValidationException::class);
        $programa = Programa::factory()->make(['descricao' => '']);
        $dados = $programa->toArray();
        ProgramaValidator::validate($dados);
    }

    public function testCreateProgramaSemValorBeneficio(){
        $this->expectException(ValidationException::class);
        $programa = Programa::factory()->make(['valor_beneficio' => '']);
        $dados = $programa->toArray();
        ProgramaValidator::validate($dados);
    }

    public function testCreatePrograma(){
        $programa = Programa::factory()->make();
        $dados = $programa->toArray();
        ProgramaValidator::validate($dados);
        Programa::create($dados);
        $this->assertTrue(true);
    }
}
