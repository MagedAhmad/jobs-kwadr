@if($martial)
    @if(method_exists($martial, 'trashed') && $martial->trashed())
        <a href="{{ route('dashboard.martials.trashed.show', $martial) }}" class="text-decoration-none text-ellipsis">
            {{ $martial->name }}
        </a>
    @else
        <a href="{{ route('dashboard.martials.show', $martial) }}" class="text-decoration-none text-ellipsis">
            {{ $martial->name }}
        </a>
    @endif
@else
    ---
@endif
