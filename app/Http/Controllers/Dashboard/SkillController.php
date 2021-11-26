<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Skill;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\SkillRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SkillController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * SkillController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Skill::class, 'skill');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::filter()->paginate();

        return view('dashboard.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\SkillRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SkillRequest $request)
    {
        $skill = Skill::create($request->all());

        flash(trans('skills.messages.created'));

        return redirect()->route('dashboard.skills.show', $skill);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return view('dashboard.skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('dashboard.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\SkillRequest $request
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        $skill->update($request->all());

        flash(trans('skills.messages.updated'));

        return redirect()->route('dashboard.skills.show', $skill);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Skill $skill
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        flash(trans('skills.messages.deleted'));

        return redirect()->route('dashboard.skills.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Skill::class);

        $skills = Skill::onlyTrashed()->paginate();

        return view('dashboard.skills.trashed', compact('skills'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Skill $skill)
    {
        return view('dashboard.skills.show', compact('skill'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Skill $skill)
    {
        $this->authorize('restore', $skill);

        $skill->restore();

        flash()->success(trans('skills.messages.restored'));

        return redirect()->route('dashboard.skills.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Skill $skill
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Skill $skill)
    {
        $this->authorize('forceDelete', $skill);

        $skill->forceDelete();

        flash(trans('skills.messages.deleted'));

        return redirect()->route('dashboard.skills.trashed');
    }
}
