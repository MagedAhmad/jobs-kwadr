@if($training_type)
    @if(method_exists($training_type, 'trashed') && $training_type->trashed())
        <a href="{{ route('dashboard.training_types.trashed.show', $training_type) }}" class="text-decoration-none text-ellipsis">
            {{ $training_type->name }}
        </a>
    @else
        <a href="{{ route('dashboard.training_types.show', $training_type) }}" class="text-decoration-none text-ellipsis">
            {{ $training_type->name }}
        </a>
    @endif
@else
    ---
@endif
