<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolsa extends Model
{
    use HasFactory;
    public static $rules = ['data_pagamento' => 'required|date',
        'conta_id' => 'required',
        'programa_id'=>'required'
    ];
    public static $messages = ['data_pagamento' => 'A data de pagamento é obrigatória e deve estar em formato de data',
        'conta_id' => 'O id da conta é obrigatório',
        'programa_id'=>'O id do programa é obrigatório'
    ];
}
