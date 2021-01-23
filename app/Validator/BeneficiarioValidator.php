<?php

namespace App\Validator;

use App\Models\Beneficiario;

class BeneficiarioValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, Beneficiario::$rules, Beneficiario::$messages);
        if(!$validator->errors()->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do Beneficiario");
        }
        return $validator;
    }
}
