<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\JobType;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\JobTypeRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobTypeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * JobTypeController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(JobType::class, 'job_type');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_types = JobType::filter()->paginate();

        return view('dashboard.job_types.index', compact('job_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.job_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\JobTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(JobTypeRequest $request)
    {
        $job_type = JobType::create($request->all());

        flash(trans('job_types.messages.created'));

        return redirect()->route('dashboard.job_types.show', $job_type);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\JobType $job_type
     * @return \Illuminate\Http\Response
     */
    public function show(JobType $job_type)
    {
        return view('dashboard.job_types.show', compact('job_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\JobType $job_type
     * @return \Illuminate\Http\Response
     */
    public function edit(JobType $job_type)
    {
        return view('dashboard.job_types.edit', compact('job_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\JobTypeRequest $request
     * @param \App\Models\JobType $job_type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(JobTypeRequest $request, JobType $job_type)
    {
        $job_type->update($request->all());

        flash(trans('job_types.messages.updated'));

        return redirect()->route('dashboard.job_types.show', $job_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\JobType $job_type
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(JobType $job_type)
    {
        $job_type->delete();

        flash(trans('job_types.messages.deleted'));

        return redirect()->route('dashboard.job_types.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', JobType::class);

        $job_types = JobType::onlyTrashed()->paginate();

        return view('dashboard.job_types.trashed', compact('job_types'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\JobType $job_type
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(JobType $job_type)
    {
        return view('dashboard.job_types.show', compact('job_type'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\JobType $job_type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(JobType $job_type)
    {
        $this->authorize('restore', $job_type);

        $job_type->restore();

        flash()->success(trans('job_types.messages.restored'));

        return redirect()->route('dashboard.job_types.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\JobType $job_type
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(JobType $job_type)
    {
        $this->authorize('forceDelete', $job_type);

        $job_type->forceDelete();

        flash(trans('job_types.messages.deleted'));

        return redirect()->route('dashboard.job_types.trashed');
    }
}
