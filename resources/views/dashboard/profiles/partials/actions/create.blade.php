@can('create', \App\Models\Profile::class)
    <a href="{{ route('dashboard.profiles.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('profiles.actions.create')
    </a>
@endcan
