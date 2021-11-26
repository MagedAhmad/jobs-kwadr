@if($supporter)
    @if(method_exists($supporter, 'trashed') && $supporter->trashed())
        <a href="{{ route('dashboard.supporters.trashed.show', $supporter) }}" class="text-decoration-none text-ellipsis">
            {{ $supporter->name }}
        </a>
    @else
        <a href="{{ route('dashboard.supporters.show', $supporter) }}" class="text-decoration-none text-ellipsis">
            {{ $supporter->name }}
        </a>
    @endif
@else
    ---
@endif
