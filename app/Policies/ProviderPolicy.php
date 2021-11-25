<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Provider;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProviderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any Providers.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Providers show');
    }

    /**
     * Determine whether the user can view the Provider.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Provider Provider
     * @return mixed
     */
    public function view(User $user, Provider $provider)
    {
        return $user->isAdmin() || $user->is($provider) || $user->hasPermissionTo('Providers show');
    }

    /**
     * Determine whether the user can create Providers.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Providers create');
    }

    /**
     * Determine whether the user can update the Provider.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Provider $provider
     * @return mixed
     */
    public function update(User $user, Provider $provider)
    {
        return ($user->isAdmin() || $user->is($provider) || $user->hasPermissionTo('Providers update')) && ! $this->trashed($provider);
    }

    /**
     * Determine whether the user can update the type of the Provider.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Provider $provider
     * @return mixed
     */
    public function updateType(User $user, Provider $provider)
    {
        return $user->isAdmin() && $user->isNot($provider) || $user->hasPermissionTo('Providers update');
    }

    /**
     * Determine whether the user can delete the Provider.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Provider $provider
     * @return mixed
     */
    public function delete(User $user, Provider $provider)
    {
        return ($user->isAdmin() && $user->isNot($provider) || $user->hasPermissionTo('Providers delete')) && ! $this->trashed($provider);
    }

    /**
     * Determine whether the user can view trashed Providers.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Providers delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Provider $provider
     * @return mixed
     */
    public function restore(User $user, Provider $provider)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Providers delete')) && $this->trashed($provider);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Provider $provider
     * @return mixed
     */
    public function forceDelete(User $user, Provider $provider)
    {
        return ($user->isAdmin() && $user->isNot($provider) || $user->hasPermissionTo('Providers delete')) && $this->trashed($provider);
    }

    /**
     * Determine wither the given Provider is trashed.
     *
     * @param $provider
     * @return bool
     */
    public function trashed($provider)
    {
        return $this->hasSoftDeletes() && method_exists($provider, 'trashed') && $provider->trashed();
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
            array_keys((new \ReflectionClass(Provider::class))->getTraits())
        );
    }
}
