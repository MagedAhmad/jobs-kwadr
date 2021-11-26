@can('viewTrash', \App\Models\Employer::class)
    <a href="{{ route('dashboard.employers.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('employers.trashed')
    </a>
@endcan
