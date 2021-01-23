<?php


namespace App\Validator;


use App\Models\Programa;

class ProgramaValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, Programa::$rules, Programa::$messages);
        if(!$validator->errors()->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do Programa");
        }
        return $validator;
    }
}
