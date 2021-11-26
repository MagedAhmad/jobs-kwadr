@can('create', \App\Models\Employer::class)
    <a href="{{ route('dashboard.employers.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('employers.actions.create')
    </a>
@endcan
