<?php


namespace App\Validator;


use App\Models\Bolsa;

class BolsaValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, Bolsa::$rules, Bolsa::$messages);
        if(!$validator->errors()->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do Bolsa");
        }
        return $validator;
    }
}
