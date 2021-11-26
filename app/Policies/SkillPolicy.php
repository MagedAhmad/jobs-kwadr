<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any skills.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Skills list');
    }

    /**
     * Determine whether the user can view the skill.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Skill $skill
     * @return mixed
     */
    public function view(User $user, Skill $skill)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Skills show');
    }

    /**
     * Determine whether the user can create skills.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Skills create');
    }

    /**
     * Determine whether the user can update the skill.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Skill $skill
     * @return mixed
     */
    public function update(User $user, Skill $skill)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Skills update');
    }

    /**
     * Determine whether the user can delete the skill.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Skill $skill
     * @return mixed
     */
    public function delete(User $user, Skill $skill)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Skills delete');
    }

     /**
     * Determine whether the user can view trashed skills.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Skills delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\skill $Skill
     * @return mixed
     */
    public function restore(User $user, skill $Skill)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Skills delete')) && $this->trashed($Skill);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\skill $Skill
     * @return mixed
     */
    public function forceDelete(User $user, skill $Skill)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('Skills delete')) && $this->trashed($Skill);
    }

    /**
     * Determine wither the given Skill is trashed.
     *
     * @param $Skill
     * @return bool
     */
    public function trashed($Skill)
    {
        return $this->hasSoftDeletes() && method_exists($Skill, 'trashed') && $Skill->trashed();
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
            array_keys((new \ReflectionClass(Skill::class))->getTraits())
        );
    }
}
