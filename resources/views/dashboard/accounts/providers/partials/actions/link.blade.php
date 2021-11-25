@if($provider)
    @if(method_exists($provider, 'trashed') && $provider->trashed())
        <a href="{{ route('dashboard.providers.trashed.show', $provider) }}" class="text-decoration-none text-ellipsis">
            {{ $provider->name }}
        </a>
    @else
        <a href="{{ route('dashboard.providers.show', $provider) }}" class="text-decoration-none text-ellipsis">
            {{ $provider->name }}
        </a>
    @endif
@else
    ---
@endif
