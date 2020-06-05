<?php

namespace App\Policies;

use App\NutritionProgram;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NutritionProgramPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any nutrition programs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the nutrition program.
     *
     * @param  \App\User  $user
     * @param  \App\NutritionProgram  $nutritionProgram
     * @return mixed
     */
    public function view(User $user, NutritionProgram $nutritionProgram)
    {
        return $user->isAdmin() ? true : ($user->id == $nutritionProgram->request->user->id);
    }

    /**
     * Determine whether the user can create nutrition programs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the nutrition program.
     *
     * @param  \App\User  $user
     * @param  \App\NutritionProgram  $nutritionProgram
     * @return mixed
     */
    public function update(User $user, NutritionProgram $nutritionProgram)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the nutrition program.
     *
     * @param  \App\User  $user
     * @param  \App\NutritionProgram  $nutritionProgram
     * @return mixed
     */
    public function delete(User $user, NutritionProgram $nutritionProgram)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the nutrition program.
     *
     * @param  \App\User  $user
     * @param  \App\NutritionProgram  $nutritionProgram
     * @return mixed
     */
    public function restore(User $user, NutritionProgram $nutritionProgram)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the nutrition program.
     *
     * @param  \App\User  $user
     * @param  \App\NutritionProgram  $nutritionProgram
     * @return mixed
     */
    public function forceDelete(User $user, NutritionProgram $nutritionProgram)
    {
        //
    }
}
