<?php

namespace App\Policies;

use App\Models\Servidor;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServidorPolicy
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
     * @param  \App\Models\Servidor  $servidor
     * @return mixed
     */
    public function view(User $user)
    {
        return \Auth::user()->tipo_usuario == 3;
    }

    public function edit(User $user){
        return \Auth::user()->tipo_usuario == 3;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return \Auth::user()->tipo_usuario == 3;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Servidor  $servidor
     * @return mixed
     */
    public function update(User $user, Servidor $servidor)
    {
        if(\Auth::user()->id == $servidor->user_id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Servidor  $servidor
     * @return mixed
     */
    public function delete(User $user, Servidor $servidor)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Servidor  $servidor
     * @return mixed
     */
    public function restore(User $user, Servidor $servidor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Servidor  $servidor
     * @return mixed
     */
    public function forceDelete(User $user, Servidor $servidor)
    {
        //
    }
}
