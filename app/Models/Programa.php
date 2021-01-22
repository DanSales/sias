<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'valor_beneficio'];

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
