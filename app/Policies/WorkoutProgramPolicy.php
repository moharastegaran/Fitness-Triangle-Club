<?php

namespace App\Policies;

use App\User;
use App\WorkoutProgram;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkoutProgramPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any workout programs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the workout program.
     *
     * @param  \App\User  $user
     * @param  \App\WorkoutProgram  $workoutProgram
     * @return mixed
     */
    public function view(User $user, WorkoutProgram $workoutProgram)
    {
        return $user->isAdmin() ? true : ($user->id == $workoutProgram->request->user->id);
    }

    /**
     * Determine whether the user can create workout programs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the workout program.
     *
     * @param  \App\User  $user
     * @param  \App\WorkoutProgram  $workoutProgram
     * @return mixed
     */
    public function update(User $user, WorkoutProgram $workoutProgram)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the workout program.
     *
     * @param  \App\User  $user
     * @param  \App\WorkoutProgram  $workoutProgram
     * @return mixed
     */
    public function delete(User $user, WorkoutProgram $workoutProgram)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the workout program.
     *
     * @param  \App\User  $user
     * @param  \App\WorkoutProgram  $workoutProgram
     * @return mixed
     */
    public function restore(User $user, WorkoutProgram $workoutProgram)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the workout program.
     *
     * @param  \App\User  $user
     * @param  \App\WorkoutProgram  $workoutProgram
     * @return mixed
     */
    public function forceDelete(User $user, WorkoutProgram $workoutProgram)
    {
        //
    }
}
