<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    public static $rules = ['relato_familiar' => 'required|file',
    'declaracao_rendimento' => 'required|file',
    'user_id' => 'required',
];
    public static $messages = ['relato_familiar.*' => 'O campo name é obrigatório e deve ser um arquivo',
        'declaracao_rendimento.*' => 'O campo name é obrigatório e deve ser um arquivo',
        'user_id.*' => 'O id do usuário é obrigatório',

    ];
}
