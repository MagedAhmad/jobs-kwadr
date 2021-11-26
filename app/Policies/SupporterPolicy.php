<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Supporter;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupporterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any supporters.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Supporters list');
    }

    /**
     * Determine whether the user can view the supporter.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Supporter $supporter
     * @return mixed
     */
    public function view(User $user, Supporter $supporter)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Supporters show');
    }

    /**
     * Determine whether the user can create supporters.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Supporters create');
    }

    /**
     * Determine whether the user can update the supporter.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Supporter $supporter
     * @return mixed
     */
    public function update(User $user, Supporter $supporter)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Supporters update');
    }

    /**
     * Determine whether the user can delete the supporter.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Supporter $supporter
     * @return mixed
     */
    public function delete(User $user, Supporter $supporter)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Supporters delete');
    }

     /**
     * Determine whether the user can view trashed supporters.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Supporters delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\supporter $Supporter
     * @return mixed
     */
    public function restore(User $user, supporter $Supporter)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Supporters delete')) && $this->trashed($Supporter);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\supporter $Supporter
     * @return mixed
     */
    public function forceDelete(User $user, supporter $Supporter)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('Supporters delete')) && $this->trashed($Supporter);
    }

    /**
     * Determine wither the given Supporter is trashed.
     *
     * @param $Supporter
     * @return bool
     */
    public function trashed($Supporter)
    {
        return $this->hasSoftDeletes() && method_exists($Supporter, 'trashed') && $Supporter->trashed();
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
            array_keys((new \ReflectionClass(Supporter::class))->getTraits())
        );
    }
}
