@can('viewTrash', \App\Models\JobType::class)
    <a href="{{ route('dashboard.job_types.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('job_types.trashed')
    </a>
@endcan
