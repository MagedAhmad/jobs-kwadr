@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\JobField::class])
    @slot('url', route('dashboard.job_fields.index'))
    @slot('name', trans('job_fields.plural'))
    @slot('active', request()->routeIs('*job_fields*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('job_fields.actions.list'),
            'url' => route('dashboard.job_fields.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\JobField::class],
            'active' => request()->routeIs('*job_fields.index')
            || request()->routeIs('*job_fields.show'),
        ],
        [
            'name' => trans('job_fields.actions.create'),
            'url' => route('dashboard.job_fields.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\JobField::class],
            'active' => request()->routeIs('*job_fields.create'),
        ],
    ])
@endcomponent
