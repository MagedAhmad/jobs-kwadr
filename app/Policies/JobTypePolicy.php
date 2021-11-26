<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobType;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any job types.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('JobTypes list');
    }

    /**
     * Determine whether the user can view the job type.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\JobType $job_type
     * @return mixed
     */
    public function view(User $user, JobType $job_type)
    {
        return $user->isAdmin() || $user->hasPermissionTo('JobTypes show');
    }

    /**
     * Determine whether the user can create job types.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('JobTypes create');
    }

    /**
     * Determine whether the user can update the job type.
     *
     * @param \App\Models\User $user
     * @param \App\Models\JobType $job_type
     * @return mixed
     */
    public function update(User $user, JobType $job_type)
    {
        return $user->isAdmin() || $user->hasPermissionTo('JobTypes update');
    }

    /**
     * Determine whether the user can delete the job type.
     *
     * @param \App\Models\User $user
     * @param \App\Models\JobType $job_type
     * @return mixed
     */
    public function delete(User $user, JobType $job_type)
    {
        return $user->isAdmin() || $user->hasPermissionTo('JobTypes delete');
    }

     /**
     * Determine whether the user can view trashed job_types.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('JobTypes delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\JobType $JobType
     * @return mixed
     */
    public function restore(User $user, JobType $JobType)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('JobTypes delete')) && $this->trashed($JobType);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\JobType $JobType
     * @return mixed
     */
    public function forceDelete(User $user, JobType $JobType)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('JobTypes delete')) && $this->trashed($JobType);
    }

    /**
     * Determine wither the given JobType is trashed.
     *
     * @param $JobType
     * @return bool
     */
    public function trashed($JobType)
    {
        return $this->hasSoftDeletes() && method_exists($JobType, 'trashed') && $JobType->trashed();
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
            array_keys((new \ReflectionClass(JobType::class))->getTraits())
        );
    }
}
