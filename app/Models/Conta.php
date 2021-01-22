<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    public static $rules = ['agencia' => 'required|numeric',
        'banco' => 'required',
        'codigo_banco' => 'required|numeric',
        'tipo_conta' => 'required',
        'numero_conta' => 'required|numeric',
        'ativa' => 'required',
        'beneficiario_id' => 'required'

    ];
    public static $messages = ['agencia' => 'A agência é obrigatória e deve ser numérica',
        'banco' => 'O banco é obrigatório',
        'codigo_banco' => 'O cod do banco é obrigatório e deve ser numérico',
        'tipo_conta' => 'O tipo de conta é obrigatório',
        'numero_conta' => 'O numéro da conta é obrigatório e deve ser númerico',
        'ativa' => 'Deve escolher se a conta está ativa',
        'beneficiario_id' => 'O id do beneficiario é obrigatório'
    ];

    public function bolsas()
    {
        return $this->hasMany('App\Models\Bolsa');
    }
}
