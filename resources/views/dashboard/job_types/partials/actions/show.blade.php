@can('view', $job_type)
    <a href="{{ route('dashboard.job_types.show', $job_type) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
