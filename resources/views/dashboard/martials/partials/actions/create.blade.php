@can('create', \App\Models\Martial::class)
    <a href="{{ route('dashboard.martials.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('martials.actions.create')
    </a>
@endcan
