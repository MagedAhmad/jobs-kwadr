@can('view', $skill)
    <a href="{{ route('dashboard.skills.show', $skill) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
