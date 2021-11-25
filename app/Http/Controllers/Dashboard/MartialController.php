<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Martial;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\MartialRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MartialController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * MartialController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Martial::class, 'martial');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $martials = Martial::filter()->paginate();

        return view('dashboard.martials.index', compact('martials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.martials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\MartialRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MartialRequest $request)
    {
        $martial = Martial::create($request->all());

        flash(trans('martials.messages.created'));

        return redirect()->route('dashboard.martials.show', $martial);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Martial $martial
     * @return \Illuminate\Http\Response
     */
    public function show(Martial $martial)
    {
        return view('dashboard.martials.show', compact('martial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Martial $martial
     * @return \Illuminate\Http\Response
     */
    public function edit(Martial $martial)
    {
        return view('dashboard.martials.edit', compact('martial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\MartialRequest $request
     * @param \App\Models\Martial $martial
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MartialRequest $request, Martial $martial)
    {
        $martial->update($request->all());

        flash(trans('martials.messages.updated'));

        return redirect()->route('dashboard.martials.show', $martial);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Martial $martial
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Martial $martial)
    {
        $martial->delete();

        flash(trans('martials.messages.deleted'));

        return redirect()->route('dashboard.martials.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Martial::class);

        $martials = Martial::onlyTrashed()->paginate();

        return view('dashboard.martials.trashed', compact('martials'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Martial $martial
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Martial $martial)
    {
        return view('dashboard.martials.show', compact('martial'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Martial $martial
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Martial $martial)
    {
        $this->authorize('restore', $martial);

        $martial->restore();

        flash()->success(trans('martials.messages.restored'));

        return redirect()->route('dashboard.martials.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Martial $martial
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Martial $martial)
    {
        $this->authorize('forceDelete', $martial);

        $martial->forceDelete();

        flash(trans('martials.messages.deleted'));

        return redirect()->route('dashboard.martials.trashed');
    }
}
