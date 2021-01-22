<?php


namespace App\Validator;


use App\Models\Anexo;

class AnexoValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, Anexo::rules, Anexo::messages);
        if(!$validator->erros->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do Beneficiario");
        }
        return $validator;
    }
}
