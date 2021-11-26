@can('viewTrash', \App\Models\TrainingType::class)
    <a href="{{ route('dashboard.training_types.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('training_types.trashed')
    </a>
@endcan
