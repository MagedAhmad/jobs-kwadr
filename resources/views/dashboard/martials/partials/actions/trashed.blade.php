@can('viewTrash', \App\Models\Martial::class)
    <a href="{{ route('dashboard.martials.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('martials.trashed')
    </a>
@endcan
