<?php

namespace Tests\Unit;

use App\Models\Edital;
use App\Validator\EditalValidator;
use App\Validator\ValidationException;
use Tests\TestCase;

class EditalValidationTest extends TestCase
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

    public function testCreateEdital(){
        $edital = Edital::factory()->make();
        $dados1 = $edital->toArray();
        EditalValidator::validate($dados1);
        Edital::create($dados1);
        $this->assertTrue(true);
    }

    public function testCreateEditalSemDados(){
        $this->expectException(ValidationException::class);
        $dados = [];
        EditalValidator::validate($dados);
    }
    public function testCreateEditalSemData(){
        $this->expectException(ValidationException::class);
        $dados = Edital::factory()->make(['data_edital' => ''])->toArray();
        EditalValidator::validate($dados);

    }

    public function testCreateEditalSemFile(){
        $this->expectException(ValidationException::class);
        $dados = Edital::factory()->make(['arquivo_edital' => ''])->toArray();
        EditalValidator::validate($dados);
    }


}
