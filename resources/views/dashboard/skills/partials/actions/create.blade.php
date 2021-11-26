@can('create', \App\Models\Skill::class)
    <a href="{{ route('dashboard.skills.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('skills.actions.create')
    </a>
@endcan
