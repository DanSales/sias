<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;

    public static $rules = ['user_id' => 'required'
    ];
    public static $messages = ['user_id.*' => 'O campo user_id é obrigatório'
    ];

    public function contas()
    {
        return $this->hasMany('App\Models\Conta');
    }
}
