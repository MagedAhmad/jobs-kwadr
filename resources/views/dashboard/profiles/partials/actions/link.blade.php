@if($profile)
    @if(method_exists($profile, 'trashed') && $profile->trashed())
        <a href="{{ route('dashboard.profiles.trashed.show', $profile) }}" class="text-decoration-none text-ellipsis">
            {{ $profile->name }}
        </a>
    @else
        <a href="{{ route('dashboard.profiles.show', $profile) }}" class="text-decoration-none text-ellipsis">
            {{ $profile->name }}
        </a>
    @endif
@else
    ---
@endif
