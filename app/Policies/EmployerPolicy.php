<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Employer;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any employers.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Employers list');
    }

    /**
     * Determine whether the user can view the employer.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Employer $employer
     * @return mixed
     */
    public function view(User $user, Employer $employer)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Employers show');
    }

    /**
     * Determine whether the user can create employers.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Employers create');
    }

    /**
     * Determine whether the user can update the employer.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Employer $employer
     * @return mixed
     */
    public function update(User $user, Employer $employer)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Employers update');
    }

    /**
     * Determine whether the user can delete the employer.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Employer $employer
     * @return mixed
     */
    public function delete(User $user, Employer $employer)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Employers delete');
    }

     /**
     * Determine whether the user can view trashed employers.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Employers delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\employer $Employer
     * @return mixed
     */
    public function restore(User $user, employer $Employer)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Employers delete')) && $this->trashed($Employer);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\employer $Employer
     * @return mixed
     */
    public function forceDelete(User $user, employer $Employer)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('Employers delete')) && $this->trashed($Employer);
    }

    /**
     * Determine wither the given Employer is trashed.
     *
     * @param $Employer
     * @return bool
     */
    public function trashed($Employer)
    {
        return $this->hasSoftDeletes() && method_exists($Employer, 'trashed') && $Employer->trashed();
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
            array_keys((new \ReflectionClass(Employer::class))->getTraits())
        );
    }
}
