<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Education;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\EducationRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EducationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * EducationController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Education::class, 'education');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::filter()->paginate();

        return view('dashboard.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\EducationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EducationRequest $request)
    {
        $education = Education::create($request->all());

        flash(trans('education.messages.created'));

        return redirect()->route('dashboard.education.show', $education);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Education $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        return view('dashboard.education.show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Education $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return view('dashboard.education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\EducationRequest $request
     * @param \App\Models\Education $education
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EducationRequest $request, Education $education)
    {
        $education->update($request->all());

        flash(trans('education.messages.updated'));

        return redirect()->route('dashboard.education.show', $education);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Education $education
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Education $education)
    {
        $education->delete();

        flash(trans('education.messages.deleted'));

        return redirect()->route('dashboard.education.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Education::class);

        $education = Education::onlyTrashed()->paginate();

        return view('dashboard.education.trashed', compact('education'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Education $education
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Education $education)
    {
        return view('dashboard.education.show', compact('education'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Education $education
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Education $education)
    {
        $this->authorize('restore', $education);

        $education->restore();

        flash()->success(trans('education.messages.restored'));

        return redirect()->route('dashboard.education.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Education $education
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Education $education)
    {
        $this->authorize('forceDelete', $education);

        $education->forceDelete();

        flash(trans('education.messages.deleted'));

        return redirect()->route('dashboard.education.trashed');
    }
}
