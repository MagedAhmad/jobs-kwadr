<x-layout :title="trans('martials.trashed')" :breadcrumbs="['dashboard.martials.trashed']">
    @include('dashboard.martials.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('martials.actions.list') ({{ count_formatted($martials->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Martial::class }}"
                        :resource="trans('martials.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Martial::class }}"
                        :resource="trans('martials.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('martials.attributes.name')</th>
            <th>@lang('martials.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($martials as $martial)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$martial"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.martials.show', $martial) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $martial->name }}
                    </a>
                </td>

                <td>{{ $martial->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.martials.partials.actions.show')
                    @include('dashboard.martials.partials.actions.restore')
                    @include('dashboard.martials.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('martials.empty')</td>
            </tr>
        @endforelse

        @if($martials->hasPages())
            @slot('footer')
                {{ $martials->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
