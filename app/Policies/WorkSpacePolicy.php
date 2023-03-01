<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkSpace;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Builder;


class WorkSpacePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\WorkSpace $workSpace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, WorkSpace $workSpace)
    {
        return $workSpace->users()->find($user)
            ? Response::allow()
            : Response::deny('You do not have permission to this workspace!');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\WorkSpace $workSpace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, WorkSpace $workSpace)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\WorkSpace $workSpace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, WorkSpace $workSpace)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\WorkSpace $workSpace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, WorkSpace $workSpace)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\WorkSpace $workSpace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, WorkSpace $workSpace)
    {
        //
    }
}
