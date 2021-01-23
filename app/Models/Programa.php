<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'valor_beneficio'];

    public static $rules = ['valor_beneficio' => 'required|numeric',
        'descricao' => 'required|min:20|max:180'
    ];
    public static $messages = ['valor_beneficio.*' => 'O valor do beneficio é obrigatório e deve ser numerico',
        'descricao.*' => 'A descrição é obrigatória e deve ser um texto'
    ];

    public function bolsas()
    {
        return $this->hasOne('App\Models\Bolsa');
    }
    public function editals()
    {
        return $this->hasMany('App\Models\Edital');
    }
    public function anexos()
    {
        return $this->hasMany('App\Models\Anexo');
    }
}
