<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bolsa extends Model
{
    use HasFactory;
    use SoftDeletes;
    public static $rules = ['data_pagamento' => 'required|date',
        'conta_id' => 'required',
    ];
    public static $messages = ['data_pagamento.*' => 'A data de pagamento é obrigatória e deve estar em formato de data',
        'conta_id.*' => 'O id da conta é obrigatório',
    ];
}
