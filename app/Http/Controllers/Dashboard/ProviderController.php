<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Provider;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\ProviderRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProviderController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * ProviderController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Provider::class, 'provider');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */
    public function index()
    {
        $providers = Provider::filter()->paginate();

        return view('dashboard.accounts.providers.index', compact('providers'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('dashboard.accounts.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\ProviderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProviderRequest $request)
    {
        $provider = Provider::create($request->allWithHashedPassword());

        $provider->setType($request->type);

        $provider->addAllMediaFromTokens();

        flash(trans('providers.messages.created'));

        return redirect()->route('dashboard.providers.show', $provider);
    }

    /**
     * @param Provider $provider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Provider $provider)
    {
        return view('dashboard.accounts.providers.show', compact('provider'));
    }

    /**
     * @param Provider $provider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Provider $provider)
    {
        return view('dashboard.accounts.providers.edit', compact('provider'));
    }

    /**
     * @param ProviderRequest $request
     * @param Provider $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProviderRequest $request, Provider $provider)
    {
        $provider->update($request->allWithHashedPassword());

        $provider->setType($request->type);

        $provider->addAllMediaFromTokens();

        flash(trans('providers.messages.updated'));

        return redirect()->route('dashboard.providers.show', $provider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Provider $provider
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();

        flash(trans('providers.messages.deleted'));

        return redirect()->route('dashboard.providers.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Provider::class);

        $providers = Provider::onlyTrashed()->paginate();

        return view('dashboard.accounts.providers.trashed', compact('providers'));
    }

    /**
     * @param Provider $provider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showTrashed(Provider $provider)
    {
        return view('dashboard.accounts.providers.show', compact('provider'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Provider $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Provider $provider)
    {
        $this->authorize('restore', $provider);

        $provider->restore();

        flash()->success(trans('providers.messages.restored'));

        return redirect()->route('dashboard.providers.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Provider $provider
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Provider $provider)
    {
        $this->authorize('forceDelete', $provider);

        $provider->forceDelete();

        flash(trans('providers.messages.deleted'));

        return redirect()->route('dashboard.providers.trashed');
    }

    /**
     * update active the specified resource from storage.
     *
     * @param Provider $provider
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Provider $provider)
    {
        $provider->setActiveStatus();

        flash(trans('supervisors.providers.updated'));

        return redirect()->route('dashboard.providers.index');
    }
}
