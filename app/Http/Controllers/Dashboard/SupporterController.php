<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Supporter;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\SupporterRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SupporterController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * SupporterController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Supporter::class, 'supporter');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supporters = Supporter::filter()->paginate();

        return view('dashboard.supporters.index', compact('supporters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.supporters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\SupporterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SupporterRequest $request)
    {
        $supporter = Supporter::create($request->all());

        flash(trans('supporters.messages.created'));

        return redirect()->route('dashboard.supporters.show', $supporter);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Supporter $supporter
     * @return \Illuminate\Http\Response
     */
    public function show(Supporter $supporter)
    {
        return view('dashboard.supporters.show', compact('supporter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Supporter $supporter
     * @return \Illuminate\Http\Response
     */
    public function edit(Supporter $supporter)
    {
        return view('dashboard.supporters.edit', compact('supporter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\SupporterRequest $request
     * @param \App\Models\Supporter $supporter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SupporterRequest $request, Supporter $supporter)
    {
        $supporter->update($request->all());

        flash(trans('supporters.messages.updated'));

        return redirect()->route('dashboard.supporters.show', $supporter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Supporter $supporter
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Supporter $supporter)
    {
        $supporter->delete();

        flash(trans('supporters.messages.deleted'));

        return redirect()->route('dashboard.supporters.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Supporter::class);

        $supporters = Supporter::onlyTrashed()->paginate();

        return view('dashboard.supporters.trashed', compact('supporters'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Supporter $supporter
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Supporter $supporter)
    {
        return view('dashboard.supporters.show', compact('supporter'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Supporter $supporter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Supporter $supporter)
    {
        $this->authorize('restore', $supporter);

        $supporter->restore();

        flash()->success(trans('supporters.messages.restored'));

        return redirect()->route('dashboard.supporters.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Supporter $supporter
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Supporter $supporter)
    {
        $this->authorize('forceDelete', $supporter);

        $supporter->forceDelete();

        flash(trans('supporters.messages.deleted'));

        return redirect()->route('dashboard.supporters.trashed');
    }
}
