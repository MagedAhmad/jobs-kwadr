@can('create', \App\Models\JobType::class)
    <a href="{{ route('dashboard.job_types.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('job_types.actions.create')
    </a>
@endcan
