<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Education;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any education.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Education list');
    }

    /**
     * Determine whether the user can view the education.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Education $education
     * @return mixed
     */
    public function view(User $user, Education $education)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Education show');
    }

    /**
     * Determine whether the user can create education.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Education create');
    }

    /**
     * Determine whether the user can update the education.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Education $education
     * @return mixed
     */
    public function update(User $user, Education $education)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Education update');
    }

    /**
     * Determine whether the user can delete the education.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Education $education
     * @return mixed
     */
    public function delete(User $user, Education $education)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Education delete');
    }

     /**
     * Determine whether the user can view trashed education.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Education delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\education $Education
     * @return mixed
     */
    public function restore(User $user, education $Education)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Education delete')) && $this->trashed($Education);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\education $Education
     * @return mixed
     */
    public function forceDelete(User $user, education $Education)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('Education delete')) && $this->trashed($Education);
    }

    /**
     * Determine wither the given Education is trashed.
     *
     * @param $Education
     * @return bool
     */
    public function trashed($Education)
    {
        return $this->hasSoftDeletes() && method_exists($Education, 'trashed') && $Education->trashed();
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
            array_keys((new \ReflectionClass(Education::class))->getTraits())
        );
    }
}
