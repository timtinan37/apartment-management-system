<?php

namespace App\Policies;

use App\Models\Committee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommitteePolicy
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
        return $user->can('view committee');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Committee  $committee
     * @return mixed
     */
    public function view(User $user, Committee $committee)
    {
        return $user->can('view committee');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create committee');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Committee  $committee
     * @return mixed
     */
    public function update(User $user, Committee $committee)
    {
        return $user->can('update committee');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Committee  $committee
     * @return mixed
     */
    public function delete(User $user, Committee $committee)
    {
        return $user->can('delete committee');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Committee  $committee
     * @return mixed
     */
    public function restore(User $user, Committee $committee)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Committee  $committee
     * @return mixed
     */
    public function forceDelete(User $user, Committee $committee)
    {
        //
    }
}
