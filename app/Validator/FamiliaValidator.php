<?php


namespace App\Validator;


use App\Models\Familia;

class FamiliaValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, Familia::$rules, Familia::$messages);
        if(!$validator->errors()->isEmpty()){
            throw new ValidationException($validator, "Erro na validação de Familia");
        }
        return $validator;
    }
}
