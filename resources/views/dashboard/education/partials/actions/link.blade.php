@if($education)
    @if(method_exists($education, 'trashed') && $education->trashed())
        <a href="{{ route('dashboard.education.trashed.show', $education) }}" class="text-decoration-none text-ellipsis">
            {{ $education->name }}
        </a>
    @else
        <a href="{{ route('dashboard.education.show', $education) }}" class="text-decoration-none text-ellipsis">
            {{ $education->name }}
        </a>
    @endif
@else
    ---
@endif
