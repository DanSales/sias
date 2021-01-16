<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    public function beneficiarios()
    {
        return $this->hasOne('App\Models\Beneficiario');
    }
    
    public function servidors()
    {
        return $this->hasOne('App\Models\Servidor');
    }
    
    public function candidatos()
    {
        return $this->hasOne('App\Models\Candidato');
    }
    
    public function familias()
    {
        return $this->hasMany('App\Models\Familia');
    }
    public function editals()
    {
        return $this->belongsToMany('App\Models\Edital');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}
