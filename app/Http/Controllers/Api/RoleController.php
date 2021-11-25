<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\RoleResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $roles = Role::filter()->simplePaginate();
        return RoleResource::collection($roles);
    }

    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    public function select()
    {
        $roles = Role::where('name', '!=','admin')->filter()->simplePaginate();

        return SelectResource::collection($roles);
    }
}
