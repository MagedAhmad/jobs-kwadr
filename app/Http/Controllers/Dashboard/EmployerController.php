<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Employer;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\EmployerRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EmployerController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * EmployerController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Employer::class, 'employer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = Employer::filter()->paginate();

        return view('dashboard.employers.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.employers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\EmployerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployerRequest $request)
    {
        $employer = Employer::create($request->all());

        flash(trans('employers.messages.created'));

        return redirect()->route('dashboard.employers.show', $employer);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        return view('dashboard.employers.show', compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $employer)
    {
        return view('dashboard.employers.edit', compact('employer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\EmployerRequest $request
     * @param \App\Models\Employer $employer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployerRequest $request, Employer $employer)
    {
        $employer->update($request->all());

        flash(trans('employers.messages.updated'));

        return redirect()->route('dashboard.employers.show', $employer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employer $employer
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employer $employer)
    {
        $employer->delete();

        flash(trans('employers.messages.deleted'));

        return redirect()->route('dashboard.employers.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Employer::class);

        $employers = Employer::onlyTrashed()->paginate();

        return view('dashboard.employers.trashed', compact('employers'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Employer $employer)
    {
        return view('dashboard.employers.show', compact('employer'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Employer $employer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Employer $employer)
    {
        $this->authorize('restore', $employer);

        $employer->restore();

        flash()->success(trans('employers.messages.restored'));

        return redirect()->route('dashboard.employers.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Employer $employer
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Employer $employer)
    {
        $this->authorize('forceDelete', $employer);

        $employer->forceDelete();

        flash(trans('employers.messages.deleted'));

        return redirect()->route('dashboard.employers.trashed');
    }
}
