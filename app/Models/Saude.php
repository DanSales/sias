<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saude extends Model
{
    use HasFactory;
    public static $rules = ['despesa_mensal' => 'required|file',
        'flag_plano' => 'required',
        'flag_doenca'=>'required',
        'flag_dificuldade'=>'required',
        'flag_deficiencia'=>'required',
        'valor_plano'=>'required|numeric',
        'familia_id'=>'required'
    ];
    public static $messages = ['despesa_mensal.*' => 'A despesa mensal é obrigatória e deve ser um arquivo',
        'flag_plano.*' => 'A resposta do plano é obrigatória',
        'flag_doenca.*'=>'A resposta da doença é obrigatória',
        'flag_dificuldade.*'=>'A resposta da dificuldade é obrigatória',
        'flag_deficiencia.*'=>'A resposta da deficiencia é obrigatória',
        'valor_plano.*'=>'O valor do plano é obrigatóro e númerico',
        'familia_id.*'=>'O id da familia é obrigatório'
    ];
}
