@if($job_type)
    @if(method_exists($job_type, 'trashed') && $job_type->trashed())
        <a href="{{ route('dashboard.job_types.trashed.show', $job_type) }}" class="text-decoration-none text-ellipsis">
            {{ $job_type->name }}
        </a>
    @else
        <a href="{{ route('dashboard.job_types.show', $job_type) }}" class="text-decoration-none text-ellipsis">
            {{ $job_type->name }}
        </a>
    @endif
@else
    ---
@endif
