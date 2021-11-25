<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Profile;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\ProfileRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Profile::class, 'profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::filter()->paginate();

        return view('dashboard.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProfileRequest $request)
    {
        $profile = Profile::create($request->all());

        $profile->addAllMediaFromTokens();

        flash(trans('profiles.messages.created'));

        return redirect()->route('dashboard.profiles.show', $profile);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('dashboard.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('dashboard.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\ProfileRequest $request
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $profile->update($request->all());

        $profile->addAllMediaFromTokens();

        flash(trans('profiles.messages.updated'));

        return redirect()->route('dashboard.profiles.show', $profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Profile $profile
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        flash(trans('profiles.messages.deleted'));

        return redirect()->route('dashboard.profiles.index');
    }

   /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Profile::class);

        $profiles = Profile::onlyTrashed()->paginate();

        return view('dashboard.profiles.trashed', compact('profiles'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Profile $profile)
    {
        return view('dashboard.profiles.show', compact('profile'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Profile $profile)
    {
        $this->authorize('restore', $profile);

        $profile->restore();

        flash()->success(trans('profiles.messages.restored'));

        return redirect()->route('dashboard.profiles.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Profile $profile
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Profile $profile)
    {
        $this->authorize('forceDelete', $profile);

        $profile->forceDelete();

        flash(trans('profiles.messages.deleted'));

        return redirect()->route('dashboard.profiles.trashed');
    }
}
