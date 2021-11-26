@can('view', $training_type)
    <a href="{{ route('dashboard.training_types.show', $training_type) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
