@can('viewTrash', \App\Models\JobField::class)
    <a href="{{ route('dashboard.job_fields.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('job_fields.trashed')
    </a>
@endcan
