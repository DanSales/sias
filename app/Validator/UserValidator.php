<?php

namespace App\Validator;

use App\Models\User;

class UserValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, User::$rules, User::$messages);
        if(!$validator->errors()->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do usuario");
        }
        return $validator;
    }
}
