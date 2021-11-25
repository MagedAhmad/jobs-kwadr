@can('viewTrash', \App\Models\Education::class)
    <a href="{{ route('dashboard.education.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('education.trashed')
    </a>
@endcan
