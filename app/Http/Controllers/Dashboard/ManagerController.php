<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Manager;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\ManagerRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ManagerController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * ManagerController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Manager::class, 'manager');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = Manager::filter()->paginate();

        return view('dashboard.accounts.managers.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.accounts.managers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\ManagerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ManagerRequest $request)
    {
        $manager = Manager::create($request->allWithHashedPassword());

        $manager->setType($request->type);

        $manager->addAllMediaFromTokens();

        flash(trans('managers.messages.created'));

        return redirect()->route('dashboard.managers.show', $manager);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Manager $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        return view('dashboard.accounts.managers.show', compact('manager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Manager $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        return view('dashboard.accounts.managers.edit', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\ManagerRequest $request
     * @param \App\Models\Manager $manager
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ManagerRequest $request, Manager $manager)
    {
        $manager->update($request->allWithHashedPassword());

        $manager->setType($request->type);

        $manager->addAllMediaFromTokens();

        flash(trans('managers.messages.updated'));

        return redirect()->route('dashboard.managers.show', $manager);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Manager $manager
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();

        flash(trans('managers.messages.deleted'));

        return redirect()->route('dashboard.managers.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Manager::class);

        $managers = Manager::onlyTrashed()->paginate();

        return view('dashboard.accounts.managers.trashed', compact('managers'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Manager $manager
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Manager $manager)
    {
        return view('dashboard.accounts.managers.show', compact('manager'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Manager $manager
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Manager $manager)
    {
        $this->authorize('restore', $manager);

        $manager->restore();

        flash()->success(trans('managers.messages.restored'));

        return redirect()->route('dashboard.managers.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Manager $manager
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Manager $manager)
    {
        $this->authorize('forceDelete', $manager);

        $manager->forceDelete();

        flash(trans('managers.messages.deleted'));

        return redirect()->route('dashboard.managers.trashed');
    }

    /**
     * update active the specified resource from storage.
     *
     * @param Manager $manager
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Manager $manager)
    {
        $manager->setActiveStatus();

        flash(trans('managers.messages.updated'));

        return redirect()->route('dashboard.managers.index');
    }
}
