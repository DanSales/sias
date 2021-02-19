<?php

namespace Tests\Unit;

use App\Models\Edital;
use App\Validator\EditalValidator;
use App\Validator\ValidationException;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class EditalValidationTest extends TestCase
{

    public function testCreateEdital(){
        $edital = Edital::factory()->create();
        $dados1 = $edital->toArray();
        $file = UploadedFile::fake()->create('file.pdf');
        $dados1['arquivo_edital'] = $file;
        EditalValidator::validate($dados1);
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
