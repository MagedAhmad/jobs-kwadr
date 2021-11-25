@can('view', $education)
    <a href="{{ route('dashboard.education.show', $education) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
