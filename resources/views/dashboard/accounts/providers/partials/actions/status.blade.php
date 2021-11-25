@can('update', $provider)
    <a href="{{ route('dashboard.providers.status', $provider) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($provider->active == 0)<i class="fas fa fa-fw fa-check"></i>@else<i class="fas fa fa-fw fa-times text-danger"></i>@endif
    </a>
@endcan
