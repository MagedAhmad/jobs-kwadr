@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\TrainingType::class])
    @slot('url', route('dashboard.training_types.index'))
    @slot('name', trans('training_types.plural'))
    @slot('active', request()->routeIs('*training_types*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('training_types.actions.list'),
            'url' => route('dashboard.training_types.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\TrainingType::class],
            'active' => request()->routeIs('*training_types.index')
            || request()->routeIs('*training_types.show'),
        ],
        [
            'name' => trans('training_types.actions.create'),
            'url' => route('dashboard.training_types.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\TrainingType::class],
            'active' => request()->routeIs('*training_types.create'),
        ],
    ])
@endcomponent
