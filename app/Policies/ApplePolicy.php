<?php

namespace App\Policies;

use App\Apple;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any apples.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the apple.
     *
     * @param  \App\User  $user
     * @param  \App\Apple  $apple
     * @return mixed
     */
    public function view(User $user, Apple $apple)
    {
        //
    }

    /**
     * Determine whether the user can create apples.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the apple.
     *
     * @param  \App\User  $user
     * @param  \App\Apple  $apple
     * @return mixed
     */
    public function update(User $user, Apple $apple)
    {
        //
    }

    /**
     * Determine whether the user can delete the apple.
     *
     * @param  \App\User  $user
     * @param  \App\Apple  $apple
     * @return mixed
     */
    public function delete(User $user, Apple $apple)
    {
        //
    }

    /**
     * Determine whether the user can restore the apple.
     *
     * @param  \App\User  $user
     * @param  \App\Apple  $apple
     * @return mixed
     */
    public function restore(User $user, Apple $apple)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the apple.
     *
     * @param  \App\User  $user
     * @param  \App\Apple  $apple
     * @return mixed
     */
    public function forceDelete(User $user, Apple $apple)
    {
        //
    }
}
