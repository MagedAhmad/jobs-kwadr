<?php

namespace App\Models;

use Parental\HasParent;
use App\Http\Filters\ProviderFilter;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\ProviderResource;
use App\Models\Relations\CustomerRelations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends User
{
    use HasFactory;
    use HasParent;
    use CustomerRelations;
    use SoftDeletes;


    /**
     * The model filter name.
     *
     * @var string
     */
    protected $filter = ProviderFilter::class;

    /**
     * Get the class name for polymorphic relations.
     *
     * @return string
     */
    public function getMorphClass()
    {
        return User::class;
    }

    /**
     * Get the default foreign key name for the model.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'user_id';
    }

    /**
     * @return CustomerResource|ProviderResource
     */
    public function getResource()
    {
        return new ProviderResource($this);
    }

    /**
     * Get the dashboard profile link.
     *
     * @return string
     */
    public function dashboardProfile(): string
    {
        return route('dashboard.providers.show', $this);
    }
}
