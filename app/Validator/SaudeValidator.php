<?php


namespace App\Validator;


use App\Models\Saude;

class SaudeValidator
{
    public static function validate($data){
        //dd($data);
        $validator = \Validator::make($data, Saude::$rules, Saude::$messages);
        if(!$validator->errors()->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do Saude");
        }
        return $validator;
    }
}
