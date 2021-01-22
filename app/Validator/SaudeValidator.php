<?php


namespace App\Validator;


use App\Models\Saude;

class SaudeValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, Saude::rules, Saude::messages);
        if(!$validator->erros->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do Saude");
        }
        return $validator;
    }
}
