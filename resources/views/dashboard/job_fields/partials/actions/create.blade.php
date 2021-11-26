@can('create', \App\Models\JobField::class)
    <a href="{{ route('dashboard.job_fields.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('job_fields.actions.create')
    </a>
@endcan
