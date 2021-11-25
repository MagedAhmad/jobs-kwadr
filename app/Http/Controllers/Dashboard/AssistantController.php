<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Assistant;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\AssistantRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AssistantController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * assistantController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Assistant::class, 'assistant');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $assistants = Assistant::forOwner()->filter()->paginate();

        return view('dashboard.accounts.assistants.index', compact('assistants'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $assistant = new Assistant();

        return view('dashboard.accounts.assistants.create', compact('assistant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\AssistantRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AssistantRequest $request)
    {
        $assistant = Assistant::create($request->allWithHashedPassword());

        $assistant->setType($request->type);

        if ($request->user()->isAdmin()) {
            $assistant->syncPermissions($request->input('permissions', []));
            $assistant->assignRole($request->input('role', []));
        }

        $assistant->addAllMediaFromTokens();

        flash(trans('assistants.messages.created'));

        return redirect()->route('dashboard.assistants.show', $assistant);
    }

    /**
     * @param Assistant $assistant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Assistant $assistant)
    {
        return view('dashboard.accounts.assistants.show', compact('assistant'));
    }

    /**
     * @param Assistant $assistant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Assistant $assistant)
    {
        return view('dashboard.accounts.assistants.edit', compact('assistant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\AssistantRequest $request
     * @param \App\Models\Assistant $assistant
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AssistantRequest $request, Assistant $assistant)
    {
        $assistant->update($request->allWithHashedPassword());

        $assistant->setType($request->type);

        if ($request->user()->isAdmin()) {
            $assistant->syncPermissions($request->input('permissions', []));
            $assistant->syncRoles($request->input('role', []));
        }

        $assistant->addAllMediaFromTokens();

        flash(trans('assistants.messages.updated'));

        return redirect()->route('dashboard.assistants.show', $assistant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Assistant $assistant
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Assistant $assistant)
    {
        $assistant->delete();

        flash(trans('assistants.messages.deleted'));

        return redirect()->route('dashboard.assistants.index');
    }

    /**
     * update active the specified resource from storage.
     *
     * @param Assistant $assistant
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Assistant $assistant)
    {
        $assistant->setActiveStatus();

        flash(trans('assistants.messages.updated'));

        return redirect()->route('dashboard.assistants.index');
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Assistant::class);

        $assistants = Assistant::onlyTrashed()->paginate();

        return view('dashboard.accounts.assistants.trashed', compact('assistants'));
    }
}
