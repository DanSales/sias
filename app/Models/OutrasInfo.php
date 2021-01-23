<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutrasInfo extends Model
{
    use HasFactory;

    public static $rules = ['atividade' => 'required|min:10|max:100',
        'renda' => 'required|numeric',
        'familia_id' => 'required'

    ];
    public static $messages = ['atividade' => 'A atividade é obrigatória e deve ter entre 10 e 100 caracteres',
        'renda.*' => 'A renda é obrigatória e deve ser numérica',
        'familia_id.*' => 'O id da familia é obrigatório'
    ];
}
