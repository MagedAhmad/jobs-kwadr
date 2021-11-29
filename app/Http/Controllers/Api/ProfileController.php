<?php

namespace App\Http\Controllers\Api;

use App\Models\Profile;
use Illuminate\Routing\Controller;
use App\Http\Resources\ProfileResource;
use App\Http\Requests\Api\ProfileRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Store profile data
     *
     * @param ProfileRequest $request
     * @return void
     */
    public function store(ProfileRequest $request) 
    {
        $profile = Profile::create($request->all());
        
        return new ProfileResource($profile);
    }
}
