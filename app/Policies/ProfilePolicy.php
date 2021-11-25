<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any profiles.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Profiles list');
    }

    /**
     * Determine whether the user can view the profile.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Profile $profile
     * @return mixed
     */
    public function view(User $user, Profile $profile)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Profiles show');
    }

    /**
     * Determine whether the user can create profiles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Profiles create');
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Profile $profile
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Profiles update');
    }

    /**
     * Determine whether the user can delete the profile.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Profile $profile
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Profiles delete');
    }

     /**
     * Determine whether the user can view trashed profiles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Profiles delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\profile $Profile
     * @return mixed
     */
    public function restore(User $user, profile $Profile)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Profiles delete')) && $this->trashed($Profile);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\profile $Profile
     * @return mixed
     */
    public function forceDelete(User $user, profile $Profile)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('Profiles delete')) && $this->trashed($Profile);
    }

    /**
     * Determine wither the given Profile is trashed.
     *
     * @param $Profile
     * @return bool
     */
    public function trashed($Profile)
    {
        return $this->hasSoftDeletes() && method_exists($Profile, 'trashed') && $Profile->trashed();
    }

    /**
     * Determine wither the model use soft deleting trait.
     *
     * @return bool
     */
    public function hasSoftDeletes()
    {
        return in_array(
            SoftDeletes::class,
            array_keys((new \ReflectionClass(Profile::class))->getTraits())
        );
    }
}
