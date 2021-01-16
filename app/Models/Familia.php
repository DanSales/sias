<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;
    
    public function saudes()
    {
        return $this->hasOne('App\Models\Saude');
    }
    public function outrasinfos()
    {
        return $this->hasMany('App\Models\Outrasinfo');
    }
}
