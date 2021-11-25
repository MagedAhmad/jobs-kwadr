@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Profile::class])
    @slot('url', route('dashboard.profiles.index'))
    @slot('name', trans('profiles.plural'))
    @slot('active', request()->routeIs('*profiles*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('profiles.actions.list'),
            'url' => route('dashboard.profiles.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Profile::class],
            'active' => request()->routeIs('*profiles.index')
            || request()->routeIs('*profiles.show'),
        ],
        [
            'name' => trans('profiles.actions.create'),
            'url' => route('dashboard.profiles.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Profile::class],
            'active' => request()->routeIs('*profiles.create'),
        ],
    ])
@endcomponent
