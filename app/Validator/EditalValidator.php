<?php


namespace App\Validator;


use App\Models\Edital;

class EditalValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, Edital::rules, Edital::messages);
        if(!$validator->erros->isEmpty()){
            throw new ValidationException($validator, "Erro na validação de Edital");
        }
        return $validator;
    }
}
