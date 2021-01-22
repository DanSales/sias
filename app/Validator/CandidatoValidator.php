<?php

namespace App\Validator;

use App\Models\Candidato;

class CandidatoValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, Candidato::rules, Candidato::messages);
        if(!$validator->erros->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do Candidato");
        }
        return $validator;
    }
}
