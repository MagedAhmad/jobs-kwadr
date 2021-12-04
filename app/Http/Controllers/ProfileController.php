<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Str;
use App\Mail\ProfileCreated;
use App\Models\ProfileToken;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileGoalsRequest;
use App\Http\Requests\InitialProfileRequest;
use App\Http\Requests\ProfileAddressRequest;
use App\Http\Requests\MainProfileDataRequest;
use App\Http\Requests\ProfileEducationRequest;

class ProfileController extends Controller
{
    /**
     * Get Register page
     *
     * @return void
     */
    public function register_form()
    {
        return view('frontend.profile.form');
    }

    /**
     * Store profile email and social security id
     *
     * @return void
     */
    public function store(InitialProfileRequest $request)
    {
        $profile = Profile::where([
            'social_security_number' => $request->social_security_number
        ])->first();

        if($profile) {
            if($profile->status) {
                flash(trans('profiles.messages.finished'));

                return redirect('profile');
            }
                
            return redirect(route('profiles.home', $profile));
        }

        $token = Str::random(32);

        $profile = Profile::where([
            'email' => $request->email
        ])->first();

        if($profile) {
            flash(trans('profiles.messages.email_used'));

            return redirect('profile');
        }

        $profile = Profile::create([
            'social_security_number' => $request->social_security_number,
            'email' => $request->email
        ]);
        
        ProfileToken::create([
            'token' => $token,
            'profile_id' => $profile->id
        ]);

        \Mail::to($request->email)->send(new ProfileCreated($token));

        return redirect(route('profiles.home', $token));
    }

    /**
     * show Main data
     *
     * @param Request $request
     * @return void
     */
    public function main_data(Request $request, $token)
    {
        $token = ProfileToken::where('token', $token)->first();

        if(!$token) {
            flash(trans('profiles.messages.token_not_valid'));

            return redirect('profile');
        }

        $profile = Profile::findOrFail($token->profile_id);

        if($profile->status) {
            flash(trans('profiles.messages.finished'));

            return redirect('profile');
        }

        $step = ProfileToken::where('profile_id', $profile->id)->first()->step;

        return view('frontend.home', compact('profile', 'step', 'token'));
    }

    /**
     * Update profile main data
     *
     * @param Request $request
     * @param $token
     * @return void
     */
    public function store_main_data(MainProfileDataRequest $request, $token)
    {
        $token = ProfileToken::where('token', $token)->first();

        if(!$token) {
            flash(trans('profiles.messages.token_not_valid'));

            return redirect('profile');
        }

        $profile = Profile::findOrFail($token->profile_id);

        $profile->update($request->all());

        $profileToken = ProfileToken::where('profile_id', $profile->id)->first();
        
        $profileToken->update([
            'step' => 1
        ]);

        $step = $profileToken->step;

        return redirect(route('profiles.home', $token->token));
    }

    /**
     * Update profile main data
     *
     * @param Request $request
     * @param $token
     * @return void
     */
    public function store_address(ProfileAddressRequest $request, $token)
    {
        $token = ProfileToken::where('token', $token)->first();

        if(!$token) {
            flash(trans('profiles.messages.token_not_valid'));

            return redirect('profile');
        }

        $profile = Profile::findOrFail($token->profile_id);

        $profile->update($request->all());

        $profileToken = ProfileToken::where('profile_id', $profile->id)->first();
        
        $profileToken->update([
            'step' => 2
        ]);

        $step = $profileToken->step;

        return redirect(route('profiles.home', $token->token));
    }

    /**
     * Store education and training data
     *
     * @param ProfileEducationRequest $request
     * @param $token
     * @return ViewResponse
     */
    public function store_education(ProfileEducationRequest $request, $token)
    {
        $token = ProfileToken::where('token', $token)->first();

        if(!$token) {
            flash(trans('profiles.messages.token_not_valid'));

            return redirect('profile');
        }

        $profile = Profile::findOrFail($token->profile_id);

        $profile->update($request->all());

        $profileToken = ProfileToken::where('profile_id', $profile->id)->first();
        
        $profileToken->update([
            'step' => 3
        ]);

        $step = $profileToken->step;

        return redirect(route('profiles.home', $token->token));
    }

    /**
     * Store profile goals
     *
     * @param ProfileGoalsRequest $request
     * @param $token
     * @return ViewResponse
     */
    public function store_goals(ProfileGoalsRequest $request, $token)
    {
        $token = ProfileToken::where('token', $token)->first();

        if(!$token) {
            flash(trans('profiles.messages.token_not_valid'));

            return redirect('profile');
        }

        $profile = Profile::findOrFail($token->profile_id);

        $profile->update($request->all());

        $profileToken = ProfileToken::where('profile_id', $profile->id)->first();
        
        $profileToken->update([
            'step' => 4
        ]);

        $step = $profileToken->step;

        $profile->update([
            'status' => 1
        ]);

        flash(trans('profiles.messages.created'));

        return redirect('profile');
    }
}
