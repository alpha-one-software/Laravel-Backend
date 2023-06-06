<?php

namespace App\Policies;

use App\Models\HrmScheduleTimeslot;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HrmScheduleTimeslotPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return $user->hasAnyRole(['organizationManager', 'receptionist', 'anesthetist', 'specialist']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\HrmScheduleTimeslot $hrmScheduleTimeslot
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->hasRole('organizationManager');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasRole('organizationManager');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\HrmScheduleTimeslot $hrmScheduleTimeslot
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->hasRole('organizationManager');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\HrmScheduleTimeslot $hrmScheduleTimeslot
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->hasRole('organizationManager');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\HrmScheduleTimeslot $hrmScheduleTimeslot
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore()
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\HrmScheduleTimeslot $hrmScheduleTimeslot
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
