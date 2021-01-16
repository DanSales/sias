<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;
    
    public function bolsas()
    {
        return $this->hasMany('App\Models\Bolsa');
    }
}
