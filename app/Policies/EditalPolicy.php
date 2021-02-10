<?php

namespace App\Policies;

use App\Models\Edital;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class EditalPolicy
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
     * @param  \App\Models\Edital  $edital
     * @return mixed
     */
    public function view(User $user, Edital $edital)
    {
        //
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
     * @param  \App\Models\Edital  $edital
     * @return mixed
     */
    public function update(User $user, Edital $edital)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Edital  $edital
     * @return mixed
     */
    public function delete(User $user, Edital $edital)
    {
        return \Auth::user()->tipo_usuario == 3;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Edital  $edital
     * @return mixed
     */
    public function restore(User $user, Edital $edital)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Edital  $edital
     * @return mixed
     */
    public function forceDelete(User $user, Edital $edital)
    {
        //
    }
}
