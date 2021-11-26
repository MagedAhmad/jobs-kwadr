@can('create', \App\Models\TrainingType::class)
    <a href="{{ route('dashboard.training_types.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('training_types.actions.create')
    </a>
@endcan
