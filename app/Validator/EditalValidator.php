<?php


namespace App\Validator;

use App\Models\Edital;

class EditalValidator
{
    public static function validate($data){
        //dd($data);
        $validator = \Validator::make($data, Edital::$rules, Edital::$messages);
        if(!$validator->errors()->isEmpty()){
            //dd($validator->errors());
            throw new ValidationException($validator, "Erro na validação de Edital");
        }
        return $validator;
    }
}
