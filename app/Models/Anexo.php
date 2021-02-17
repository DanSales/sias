<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Anexo extends Model
{
    use HasFactory;
    use SoftDeletes;
    public static $rules = ['caminho_arquivo' => 'required|file',
                            'programa_id' => 'required'
    ];
    public static $messages = ['caminho_arquivo.*' => 'O arquivo é um campo obrigatório',
        'programa_id.*' => 'O campo id do programa é obrigatório'
    ];
}
