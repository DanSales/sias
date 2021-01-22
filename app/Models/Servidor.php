<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    use HasFactory;

    public static $rules = ['user_id' => 'required'
    ];
    public static $messages = ['user_id.*' => 'O campo user_id é obrigatório'
    ];
}
