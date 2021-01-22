<?php


namespace App\Validator;


use App\Models\Conta;

class ContaValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, Conta::rules, Conta::messages);
        if(!$validator->erros->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do Programa");
        }
        return $validator;
    }
}
