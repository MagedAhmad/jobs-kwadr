@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Employer::class])
    @slot('url', route('dashboard.employers.index'))
    @slot('name', trans('employers.plural'))
    @slot('active', request()->routeIs('*employers*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('employers.actions.list'),
            'url' => route('dashboard.employers.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Employer::class],
            'active' => request()->routeIs('*employers.index')
            || request()->routeIs('*employers.show'),
        ],
        [
            'name' => trans('employers.actions.create'),
            'url' => route('dashboard.employers.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Employer::class],
            'active' => request()->routeIs('*employers.create'),
        ],
    ])
@endcomponent
