@can('view', $supporter)
    <a href="{{ route('dashboard.supporters.show', $supporter) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
