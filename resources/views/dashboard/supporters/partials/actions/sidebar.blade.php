@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Supporter::class])
    @slot('url', route('dashboard.supporters.index'))
    @slot('name', trans('supporters.plural'))
    @slot('active', request()->routeIs('*supporters*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('supporters.actions.list'),
            'url' => route('dashboard.supporters.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Supporter::class],
            'active' => request()->routeIs('*supporters.index')
            || request()->routeIs('*supporters.show'),
        ],
        [
            'name' => trans('supporters.actions.create'),
            'url' => route('dashboard.supporters.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Supporter::class],
            'active' => request()->routeIs('*supporters.create'),
        ],
    ])
@endcomponent
