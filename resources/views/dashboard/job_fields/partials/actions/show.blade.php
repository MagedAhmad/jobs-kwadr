@can('view', $job_field)
    <a href="{{ route('dashboard.job_fields.show', $job_field) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
