<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    use HasFactory;

    public static $rules = ['data_edital' => 'required|date',
        'numero_edital' => 'required|numeric',
        'arquivo_edital' => 'required|file',
        'programa_id' => 'required'

    ];
    public static $messages = ['data_edital.*' => 'A data do edital é obrigatória e deve ser em formato de data',
        'numero_edital.*' => 'O número do edital é obrigatório e deve ser numérico',
        'arquivo_edital.*' => 'O arquivo do edital é obrigatório e deve ser um arquivo',
        'programa_id.*' => 'O id do programa é obrigatório'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function programa(){
        return $this->hasOne('App\Models\Programa');
    }

}
