<?php

namespace App\Policies;

use App\Models\Familia;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FamiliaPolicy
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
     * @param  \App\Models\Familia  $familia
     * @return mixed
     */
    public function view(User $user)
    {
        return \Auth::user()->tipo_usuario == 2 || \Auth::user()->tipo_usuario == 1;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return \Auth::user()->tipo_usuario == 2 || \Auth::user()->tipo_usuario == 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Familia  $familia
     * @return mixed
     */
    public function update(User $user, Familia $familia)
    {
        return \Auth::user()->id == $familia->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Familia  $familia
     * @return mixed
     */
    public function delete(User $user, Familia $familia)
    {
        return \Auth::user()->id == $familia->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Familia  $familia
     * @return mixed
     */
    public function restore(User $user, Familia $familia)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Familia  $familia
     * @return mixed
     */
    public function forceDelete(User $user, Familia $familia)
    {
        //
    }
}
