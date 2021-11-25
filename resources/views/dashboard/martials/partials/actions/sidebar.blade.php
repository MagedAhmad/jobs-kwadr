@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Martial::class])
    @slot('url', route('dashboard.martials.index'))
    @slot('name', trans('martials.plural'))
    @slot('active', request()->routeIs('*martials*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('martials.actions.list'),
            'url' => route('dashboard.martials.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Martial::class],
            'active' => request()->routeIs('*martials.index')
            || request()->routeIs('*martials.show'),
        ],
        [
            'name' => trans('martials.actions.create'),
            'url' => route('dashboard.martials.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Martial::class],
            'active' => request()->routeIs('*martials.create'),
        ],
    ])
@endcomponent
