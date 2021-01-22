<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;

    public static $rules = ['cpf' => 'required|size:11|numeric',
        'data_nascimento' => 'required|date',
        'declaracao_autonomo' => 'required|file',
        'declaracao_agricultor' => 'required|file',
        'escolaridade' => 'required|min:5|max:50',
        'renda_mensal' => 'required|numeric',
        'profissao' => 'required|min:4|max:100',
        'user_id' => 'required'

    ];
    public static $messages = ['cpf' => 'O cpf é obrigatório e deve ter 11 numeros',
        'data_nascimento' => 'A data de nascimento é obrigatória e deve ter formato de data',
        'declaracao_autonomo' => 'A declaração de autonomo é obrigatória e deve ser um arquivo',
        'declaracao_agricultor' => 'A declaração de agricultor é obrigatória e deve ser um arquivo',
        'escolaridade' => 'A escolaridade é obrigatória e deve ter entre 5 e 50 caracteres',
        'renda_mensal' => 'A renda mensal é obrigatória e deve ser numérica',
        'profissao' => 'A profissão é obrigatória e deve ter entre 4 a 100 caracteres',
        'user_id' => 'O id do usuário deve estar marcado'
    ];

    public function saudes()
    {
        return $this->hasOne('App\Models\Saude');
    }
    public function outrasinfos()
    {
        return $this->hasMany('App\Models\Outrasinfo');
    }
}
