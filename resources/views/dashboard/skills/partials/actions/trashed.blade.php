@can('viewTrash', \App\Models\Skill::class)
    <a href="{{ route('dashboard.skills.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('skills.trashed')
    </a>
@endcan
