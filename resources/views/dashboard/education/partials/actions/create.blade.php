@can('create', \App\Models\Education::class)
    <a href="{{ route('dashboard.education.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('education.actions.create')
    </a>
@endcan
