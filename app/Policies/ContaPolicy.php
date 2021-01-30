<?php

namespace App\Policies;

use App\Models\Bolsa;
use App\Models\Conta;
use App\Models\User;
use App\Models\Beneficiario;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conta  $conta
     * @return mixed
     */
    public function view(User $user)
    {
        return \Auth::user()->tipo_usuario == 2;
    }

    /**
     * Determine whether the user can view the model.
     * @param  \App\Models\User  $user
     * @param \App\Models\Conta $conta
     * @return mixed
     */
    public function viewBolsaBeneficiario(User  $user, Conta $conta){
        return \Auth::user()->tipo_usuario == 2 && \Auth::user()->beneficiarios->id == $conta->beneficiario_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return \Auth::user()->tipo_usuario == 2;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conta  $conta
     * @return mixed
     */
    public function update(User $user, Conta $conta)
    {
        if(\Auth::user()->tipo_usuario !=  2){
            return false;
        }
        return \Auth::user()->beneficiarios->id == $conta->beneficiario_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conta  $conta
     * @return mixed
     */
    public function delete(User $user, Conta $conta)
    {
        if(\Auth::user()->tipo_usuario !=  2){
            return false;
        }
        return \Auth::user()->beneficiarios->id == $conta->beneficiario_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conta  $conta
     * @return mixed
     */
    public function restore(User $user, Conta $conta)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conta  $conta
     * @return mixed
     */
    public function forceDelete(User $user, Conta $conta)
    {
        //
    }
}
