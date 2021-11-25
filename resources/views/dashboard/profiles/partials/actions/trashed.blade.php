@can('viewTrash', \App\Models\Profile::class)
    <a href="{{ route('dashboard.profiles.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('profiles.trashed')
    </a>
@endcan
