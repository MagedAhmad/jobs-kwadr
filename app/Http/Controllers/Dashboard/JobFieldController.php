<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\JobField;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\JobFieldRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobFieldController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * JobFieldController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(JobField::class, 'job_field');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_fields = JobField::filter()->paginate();

        return view('dashboard.job_fields.index', compact('job_fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.job_fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\JobFieldRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(JobFieldRequest $request)
    {
        $job_field = JobField::create($request->all());

        flash(trans('job_fields.messages.created'));

        return redirect()->route('dashboard.job_fields.show', $job_field);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\JobField $job_field
     * @return \Illuminate\Http\Response
     */
    public function show(JobField $job_field)
    {
        return view('dashboard.job_fields.show', compact('job_field'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\JobField $job_field
     * @return \Illuminate\Http\Response
     */
    public function edit(JobField $job_field)
    {
        return view('dashboard.job_fields.edit', compact('job_field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\JobFieldRequest $request
     * @param \App\Models\JobField $job_field
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(JobFieldRequest $request, JobField $job_field)
    {
        $job_field->update($request->all());

        flash(trans('job_fields.messages.updated'));

        return redirect()->route('dashboard.job_fields.show', $job_field);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\JobField $job_field
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(JobField $job_field)
    {
        $job_field->delete();

        flash(trans('job_fields.messages.deleted'));

        return redirect()->route('dashboard.job_fields.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', JobField::class);

        $job_fields = JobField::onlyTrashed()->paginate();

        return view('dashboard.job_fields.trashed', compact('job_fields'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\JobField $job_field
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(JobField $job_field)
    {
        return view('dashboard.job_fields.show', compact('job_field'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\JobField $job_field
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(JobField $job_field)
    {
        $this->authorize('restore', $job_field);

        $job_field->restore();

        flash()->success(trans('job_fields.messages.restored'));

        return redirect()->route('dashboard.job_fields.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\JobField $job_field
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(JobField $job_field)
    {
        $this->authorize('forceDelete', $job_field);

        $job_field->forceDelete();

        flash(trans('job_fields.messages.deleted'));

        return redirect()->route('dashboard.job_fields.trashed');
    }
}
