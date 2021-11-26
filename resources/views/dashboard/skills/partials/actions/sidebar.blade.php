@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Skill::class])
    @slot('url', route('dashboard.skills.index'))
    @slot('name', trans('skills.plural'))
    @slot('active', request()->routeIs('*skills*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('skills.actions.list'),
            'url' => route('dashboard.skills.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Skill::class],
            'active' => request()->routeIs('*skills.index')
            || request()->routeIs('*skills.show'),
        ],
        [
            'name' => trans('skills.actions.create'),
            'url' => route('dashboard.skills.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Skill::class],
            'active' => request()->routeIs('*skills.create'),
        ],
    ])
@endcomponent
