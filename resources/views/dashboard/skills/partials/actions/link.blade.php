@if($skill)
    @if(method_exists($skill, 'trashed') && $skill->trashed())
        <a href="{{ route('dashboard.skills.trashed.show', $skill) }}" class="text-decoration-none text-ellipsis">
            {{ $skill->name }}
        </a>
    @else
        <a href="{{ route('dashboard.skills.show', $skill) }}" class="text-decoration-none text-ellipsis">
            {{ $skill->name }}
        </a>
    @endif
@else
    ---
@endif
