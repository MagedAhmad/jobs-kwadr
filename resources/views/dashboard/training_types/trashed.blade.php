<x-layout :title="trans('training_types.trashed')" :breadcrumbs="['dashboard.training_types.trashed']">
    @include('dashboard.training_types.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('training_types.actions.list') ({{ count_formatted($training_types->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\TrainingType::class }}"
                        :resource="trans('training_types.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\TrainingType::class }}"
                        :resource="trans('training_types.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('training_types.attributes.name')</th>
            <th>@lang('training_types.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($training_types as $training_type)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$training_type"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.training_types.show', $training_type) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $training_type->name }}
                    </a>
                </td>

                <td>{{ $training_type->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.training_types.partials.actions.show')
                    @include('dashboard.training_types.partials.actions.restore')
                    @include('dashboard.training_types.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('training_types.empty')</td>
            </tr>
        @endforelse

        @if($training_types->hasPages())
            @slot('footer')
                {{ $training_types->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
