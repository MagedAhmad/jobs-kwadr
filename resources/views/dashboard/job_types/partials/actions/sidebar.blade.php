@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\JobType::class])
    @slot('url', route('dashboard.job_types.index'))
    @slot('name', trans('job_types.plural'))
    @slot('active', request()->routeIs('*job_types*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('job_types.actions.list'),
            'url' => route('dashboard.job_types.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\JobType::class],
            'active' => request()->routeIs('*job_types.index')
            || request()->routeIs('*job_types.show'),
        ],
        [
            'name' => trans('job_types.actions.create'),
            'url' => route('dashboard.job_types.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\JobType::class],
            'active' => request()->routeIs('*job_types.create'),
        ],
    ])
@endcomponent
