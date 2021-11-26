<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\TrainingType;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\TrainingTypeRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TrainingTypeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * TrainingTypeController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(TrainingType::class, 'training_type');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_types = TrainingType::filter()->paginate();

        return view('dashboard.training_types.index', compact('training_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.training_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\TrainingTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TrainingTypeRequest $request)
    {
        $training_type = TrainingType::create($request->all());

        flash(trans('training_types.messages.created'));

        return redirect()->route('dashboard.training_types.show', $training_type);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TrainingType $training_type
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingType $training_type)
    {
        return view('dashboard.training_types.show', compact('training_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TrainingType $training_type
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingType $training_type)
    {
        return view('dashboard.training_types.edit', compact('training_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\TrainingTypeRequest $request
     * @param \App\Models\TrainingType $training_type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TrainingTypeRequest $request, TrainingType $training_type)
    {
        $training_type->update($request->all());

        flash(trans('training_types.messages.updated'));

        return redirect()->route('dashboard.training_types.show', $training_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TrainingType $training_type
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TrainingType $training_type)
    {
        $training_type->delete();

        flash(trans('training_types.messages.deleted'));

        return redirect()->route('dashboard.training_types.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', TrainingType::class);

        $training_types = TrainingType::onlyTrashed()->paginate();

        return view('dashboard.training_types.trashed', compact('training_types'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\TrainingType $training_type
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(TrainingType $training_type)
    {
        return view('dashboard.training_types.show', compact('training_type'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\TrainingType $training_type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(TrainingType $training_type)
    {
        $this->authorize('restore', $training_type);

        $training_type->restore();

        flash()->success(trans('training_types.messages.restored'));

        return redirect()->route('dashboard.training_types.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\TrainingType $training_type
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(TrainingType $training_type)
    {
        $this->authorize('forceDelete', $training_type);

        $training_type->forceDelete();

        flash(trans('training_types.messages.deleted'));

        return redirect()->route('dashboard.training_types.trashed');
    }
}
