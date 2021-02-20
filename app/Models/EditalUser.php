<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditalUser extends Model
{
    use HasFactory;
    protected $table = 'edital_users';

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function editais(){
        return $this->belongsTo('App\Models\Edital','edital_id','id');
    }

    public function familias(){
        return $this->belongsToMany('App\Models\Familia', 'edital_user_familia', 'edital_user_id', 'familia_id');
    }
}


