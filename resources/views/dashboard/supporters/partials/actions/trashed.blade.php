@can('viewTrash', \App\Models\Supporter::class)
    <a href="{{ route('dashboard.supporters.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('supporters.trashed')
    </a>
@endcan
