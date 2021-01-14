<?php

namespace App\Policies;

use App\Models\Resident;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResidentPolicy
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
        return $user->can('view resident');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resident  $resident
     * @return mixed
     */
    public function view(User $user, Resident $resident)
    {
        return $user->can('view resident');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create resident');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resident  $resident
     * @return mixed
     */
    public function update(User $user, Resident $resident)
    {
        return $user->can('update resident');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resident  $resident
     * @return mixed
     */
    public function delete(User $user, Resident $resident)
    {
        return $user->can('delete resident');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resident  $resident
     * @return mixed
     */
    public function restore(User $user, Resident $resident)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resident  $resident
     * @return mixed
     */
    public function forceDelete(User $user, Resident $resident)
    {
        //
    }
}
