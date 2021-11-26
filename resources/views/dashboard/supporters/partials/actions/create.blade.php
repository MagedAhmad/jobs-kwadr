@can('create', \App\Models\Supporter::class)
    <a href="{{ route('dashboard.supporters.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('supporters.actions.create')
    </a>
@endcan
