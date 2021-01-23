<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    use HasFactory;
    public static $rules = ['caminho_arquivo' => 'required|file',
                            'programa_id' => 'required'
    ];
    public static $messages = ['caminho_arquivo.*' => 'O arquivo é um campo obrigatório',
        'programa_id.*' => 'O campo id do programa é obrigatório'
    ];
}
