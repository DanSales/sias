<?php

namespace App\Policies;

use App\Models\Programa;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramaPolicy
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
     * @param  \App\Models\Programa  $programa
     * @return mixed
     */
    public function view(User $user, Programa $programa)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param \App\Models\Programa $programa
     * @return mixed
     */
    public function viewBolsaPrograma(User $user, Programa $programa){
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
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Programa  $programa
     * @return mixed
     */
    public function restore(User $user, Programa $programa)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Programa  $programa
     * @return mixed
     */
    public function forceDelete(User $user, Programa $programa)
    {
        //
    }
}
