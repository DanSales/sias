<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Beneficiario extends Model
{
    use HasFactory;
	use SoftDeletes;
    public static $rules = ['user_id' => 'required'
    ];
    public static $messages = ['user_id.*' => 'O campo user_id é obrigatório'
    ];

    public function contas()
    {
        return $this->hasMany('App\Models\Conta');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
