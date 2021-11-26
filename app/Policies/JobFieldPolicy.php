<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobField;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobFieldPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any job fields.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('JobFields list');
    }

    /**
     * Determine whether the user can view the job field.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\JobField $job_field
     * @return mixed
     */
    public function view(User $user, JobField $job_field)
    {
        return $user->isAdmin() || $user->hasPermissionTo('JobFields show');
    }

    /**
     * Determine whether the user can create job fields.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('JobFields create');
    }

    /**
     * Determine whether the user can update the job field.
     *
     * @param \App\Models\User $user
     * @param \App\Models\JobField $job_field
     * @return mixed
     */
    public function update(User $user, JobField $job_field)
    {
        return $user->isAdmin() || $user->hasPermissionTo('JobFields update');
    }

    /**
     * Determine whether the user can delete the job field.
     *
     * @param \App\Models\User $user
     * @param \App\Models\JobField $job_field
     * @return mixed
     */
    public function delete(User $user, JobField $job_field)
    {
        return $user->isAdmin() || $user->hasPermissionTo('JobFields delete');
    }

     /**
     * Determine whether the user can view trashed job_fields.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('JobFields delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\JobField $JobField
     * @return mixed
     */
    public function restore(User $user, JobField $JobField)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('JobFields delete')) && $this->trashed($JobField);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\JobField $JobField
     * @return mixed
     */
    public function forceDelete(User $user, JobField $JobField)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('JobFields delete')) && $this->trashed($JobField);
    }

    /**
     * Determine wither the given JobField is trashed.
     *
     * @param $JobField
     * @return bool
     */
    public function trashed($JobField)
    {
        return $this->hasSoftDeletes() && method_exists($JobField, 'trashed') && $JobField->trashed();
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
            array_keys((new \ReflectionClass(JobField::class))->getTraits())
        );
    }
}
