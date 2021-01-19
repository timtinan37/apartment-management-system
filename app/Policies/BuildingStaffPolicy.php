<?php

namespace App\Policies;

use App\Models\BuildingStaff;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuildingStaffPolicy
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
        return $user->can('view building-staff');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BuildingStaff  $buildingStaff
     * @return mixed
     */
    public function view(User $user, BuildingStaff $buildingStaff)
    {
        return $user->can('view building-staff');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create building-staff');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BuildingStaff  $buildingStaff
     * @return mixed
     */
    public function update(User $user, BuildingStaff $buildingStaff)
    {
        return $user->can('update building-staff');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BuildingStaff  $buildingStaff
     * @return mixed
     */
    public function delete(User $user, BuildingStaff $buildingStaff)
    {
        return $user->can('delete building-staff');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BuildingStaff  $buildingStaff
     * @return mixed
     */
    public function restore(User $user, BuildingStaff $buildingStaff)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BuildingStaff  $buildingStaff
     * @return mixed
     */
    public function forceDelete(User $user, BuildingStaff $buildingStaff)
    {
        //
    }
}
