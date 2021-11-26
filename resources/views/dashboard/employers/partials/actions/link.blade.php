@if($employer)
    @if(method_exists($employer, 'trashed') && $employer->trashed())
        <a href="{{ route('dashboard.employers.trashed.show', $employer) }}" class="text-decoration-none text-ellipsis">
            {{ $employer->name }}
        </a>
    @else
        <a href="{{ route('dashboard.employers.show', $employer) }}" class="text-decoration-none text-ellipsis">
            {{ $employer->name }}
        </a>
    @endif
@else
    ---
@endif
