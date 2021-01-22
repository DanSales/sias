<?php


namespace App\Validator;


use App\Models\OutrasInfo;

class OutrasInfoValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, OutrasInfo::rules, OutrasInfo::messages);
        if(!$validator->erros->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do Outras infos");
        }
        return $validator;
    }
}
