@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Education::class])
    @slot('url', route('dashboard.education.index'))
    @slot('name', trans('education.plural'))
    @slot('active', request()->routeIs('*education*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('education.actions.list'),
            'url' => route('dashboard.education.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Education::class],
            'active' => request()->routeIs('*education.index')
            || request()->routeIs('*education.show'),
        ],
        [
            'name' => trans('education.actions.create'),
            'url' => route('dashboard.education.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Education::class],
            'active' => request()->routeIs('*education.create'),
        ],
    ])
@endcomponent
