@can('create', \App\Models\Provider::class)
    <a href="{{ route('dashboard.providers.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('providers.actions.create')
    </a>
@endcan
