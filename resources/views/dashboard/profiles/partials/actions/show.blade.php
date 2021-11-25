@can('view', $profile)
    <a href="{{ route('dashboard.profiles.show', $profile) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
