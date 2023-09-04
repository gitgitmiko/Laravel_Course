<?php

namespace App\Policies;

use App\User;
use App\Tag;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if($user->role === 'admin'){
            return true;

        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function view(User $user, tag $tag)
    {
        //
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function update(User $user, tag $tag)
    {
        //
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function delete(User $user, tag $tag)
    {
        //
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function restore(User $user, tag $tag)
    {
        //
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function forceDelete(User $user, tag $tag)
    {
        //
        return false;
    }
}
