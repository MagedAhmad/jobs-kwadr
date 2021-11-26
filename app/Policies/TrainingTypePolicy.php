<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TrainingType;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any training types.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('TrainingTypes list');
    }

    /**
     * Determine whether the user can view the training type.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\TrainingType $training_type
     * @return mixed
     */
    public function view(User $user, TrainingType $training_type)
    {
        return $user->isAdmin() || $user->hasPermissionTo('TrainingTypes show');
    }

    /**
     * Determine whether the user can create training types.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('TrainingTypes create');
    }

    /**
     * Determine whether the user can update the training type.
     *
     * @param \App\Models\User $user
     * @param \App\Models\TrainingType $training_type
     * @return mixed
     */
    public function update(User $user, TrainingType $training_type)
    {
        return $user->isAdmin() || $user->hasPermissionTo('TrainingTypes update');
    }

    /**
     * Determine whether the user can delete the training type.
     *
     * @param \App\Models\User $user
     * @param \App\Models\TrainingType $training_type
     * @return mixed
     */
    public function delete(User $user, TrainingType $training_type)
    {
        return $user->isAdmin() || $user->hasPermissionTo('TrainingTypes delete');
    }

     /**
     * Determine whether the user can view trashed training_types.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('TrainingTypes delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\TrainingType $TrainingType
     * @return mixed
     */
    public function restore(User $user, TrainingType $TrainingType)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('TrainingTypes delete')) && $this->trashed($TrainingType);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\training_type $TrainingType
     * @return mixed
     */
    public function forceDelete(User $user, TrainingType $TrainingType)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('TrainingTypes delete')) && $this->trashed($TrainingType);
    }

    /**
     * Determine wither the given TrainingType is trashed.
     *
     * @param $TrainingType
     * @return bool
     */
    public function trashed($TrainingType)
    {
        return $this->hasSoftDeletes() && method_exists($TrainingType, 'trashed') && $TrainingType->trashed();
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
            array_keys((new \ReflectionClass(TrainingType::class))->getTraits())
        );
    }
}
