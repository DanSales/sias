<?php

namespace App\Policies;

use App\Models\EditalUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EditalUserPolicy
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
     * @param  \App\Models\EditalUser  $editalUser
     * @return mixed
     */
    public function view(User $user, EditalUser $editalUser)
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EditalUser  $editalUser
     * @return mixed
     */
    public function update(User $user, EditalUser $editalUser)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EditalUser  $editalUser
     * @return mixed
     */
    public function delete(User $user, EditalUser $editalUser)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EditalUser  $editalUser
     * @return mixed
     */
    public function restore(User $user, EditalUser $editalUser)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EditalUser  $editalUser
     * @return mixed
     */
    public function forceDelete(User $user, EditalUser $editalUser)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EditalUser  $editalUser
     * @return mixed
     */

    public function detalhesInscricao(User $user, EditalUser $editalUser){
        if (\Auth::user()->tipo_usuario == 3){
            return true;
        } else{
            $inscricoes = EditalUser::where('user_id', '=',\Auth::user()->id)->get();
            foreach ($inscricoes as $i){
                if($i->id == $editalUser->id){
                    return true;
                }
            }
            return false;
        }

    }

    public function inscricao(User $user){
        return ((\Auth::user()->tipo_usuario == 1) || (\Auth::user()->tipo_usuario == 2));
    }

    public function listInscricoes(User $user){
        return ((\Auth::user()->tipo_usuario == 1) || (\Auth::user()->tipo_usuario == 2));
    }

}
