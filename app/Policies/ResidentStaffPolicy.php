<?php

namespace App\Policies;

use App\Models\ResidentStaff;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResidentStaffPolicy
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
        return $user->can('view resident-staff');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ResidentStaff  $residentStaff
     * @return mixed
     */
    public function view(User $user, ResidentStaff $residentStaff)
    {
        return $user->can('view resident-staff');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create resident-staff');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ResidentStaff  $residentStaff
     * @return mixed
     */
    public function update(User $user, ResidentStaff $residentStaff)
    {
        return $user->can('update resident-staff');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ResidentStaff  $residentStaff
     * @return mixed
     */
    public function delete(User $user, ResidentStaff $residentStaff)
    {
        return $user->can('delete resident-staff');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ResidentStaff  $residentStaff
     * @return mixed
     */
    public function restore(User $user, ResidentStaff $residentStaff)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ResidentStaff  $residentStaff
     * @return mixed
     */
    public function forceDelete(User $user, ResidentStaff $residentStaff)
    {
        //
    }
}
