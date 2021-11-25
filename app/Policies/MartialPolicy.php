<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Martial;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class MartialPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any martials.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Martials list');
    }

    /**
     * Determine whether the user can view the martial.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Martial $martial
     * @return mixed
     */
    public function view(User $user, Martial $martial)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Martials show');
    }

    /**
     * Determine whether the user can create martials.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Martials create');
    }

    /**
     * Determine whether the user can update the martial.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Martial $martial
     * @return mixed
     */
    public function update(User $user, Martial $martial)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Martials update');
    }

    /**
     * Determine whether the user can delete the martial.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Martial $martial
     * @return mixed
     */
    public function delete(User $user, Martial $martial)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Martials delete');
    }

     /**
     * Determine whether the user can view trashed martials.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Martials delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\martial $Martial
     * @return mixed
     */
    public function restore(User $user, martial $Martial)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Martials delete')) && $this->trashed($Martial);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\martial $Martial
     * @return mixed
     */
    public function forceDelete(User $user, martial $Martial)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('Martials delete')) && $this->trashed($Martial);
    }

    /**
     * Determine wither the given Martial is trashed.
     *
     * @param $Martial
     * @return bool
     */
    public function trashed($Martial)
    {
        return $this->hasSoftDeletes() && method_exists($Martial, 'trashed') && $Martial->trashed();
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
            array_keys((new \ReflectionClass(Martial::class))->getTraits())
        );
    }
}
