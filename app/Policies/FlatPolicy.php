<?php

namespace App\Policies;

use App\Models\Flat;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FlatPolicy
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
        return $user->can('view flat');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Flat  $flat
     * @return mixed
     */
    public function view(User $user, Flat $flat)
    {
        return $user->can('view flat');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create flat');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Flat  $flat
     * @return mixed
     */
    public function update(User $user, Flat $flat)
    {
        return $user->can('update flat');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Flat  $flat
     * @return mixed
     */
    public function delete(User $user, Flat $flat)
    {
        return $user->can('delete flat');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Flat  $flat
     * @return mixed
     */
    public function restore(User $user, Flat $flat)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Flat  $flat
     * @return mixed
     */
    public function forceDelete(User $user, Flat $flat)
    {
        //
    }
}
