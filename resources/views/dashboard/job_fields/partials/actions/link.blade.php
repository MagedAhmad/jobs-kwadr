@if($job_field)
    @if(method_exists($job_field, 'trashed') && $job_field->trashed())
        <a href="{{ route('dashboard.job_fields.trashed.show', $job_field) }}" class="text-decoration-none text-ellipsis">
            {{ $job_field->name }}
        </a>
    @else
        <a href="{{ route('dashboard.job_fields.show', $job_field) }}" class="text-decoration-none text-ellipsis">
            {{ $job_field->name }}
        </a>
    @endif
@else
    ---
@endif
