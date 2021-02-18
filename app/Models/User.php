<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public static $rules = ['email' => 'required|email|string',
                            'nome_completo' => 'required|min:14|max:100',
                            'cpf' => 'required|digits:11|numeric',
                            'data_nascimento' => 'required|string',
                            'endereco' => 'required|min:15|max:100'
        ];
    public static $messages = ['email.*' => 'O campo email é obrigatório e deve ter formato de email',
                                'nome_completo.*' => 'O nome completo é obrigatório e deve ter entre 14 e 100 caracteres',
                                'cpf.*' => 'O campo cpf é obrigatório, deve ter 11 caracteres e deve ser composto de números',
                                'data_nascimento.*' => "O campo de data de nascimento é obrigatório e deve ter formato de data",
                                'endereco.*' => 'O campo endereço é obrigatório e deve ter entre 15 e 100 caracteres'

    ];

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
        'cpf',
        'endereco',
        'nome_completo',
        'data_nascimento',
        'tipo_usuario',
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
