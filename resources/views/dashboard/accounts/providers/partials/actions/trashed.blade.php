@can('viewTrash', \App\Models\Provider::class)
    <a href="{{ route('dashboard.providers.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('providers.trashed')
    </a>
@endcan
