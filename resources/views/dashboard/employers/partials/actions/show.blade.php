@can('view', $employer)
    <a href="{{ route('dashboard.employers.show', $employer) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
