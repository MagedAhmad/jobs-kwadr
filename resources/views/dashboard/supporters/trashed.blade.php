<x-layout :title="trans('supporters.trashed')" :breadcrumbs="['dashboard.supporters.trashed']">
    @include('dashboard.supporters.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('supporters.actions.list') ({{ count_formatted($supporters->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Supporter::class }}"
                        :resource="trans('supporters.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Supporter::class }}"
                        :resource="trans('supporters.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('supporters.attributes.name')</th>
            <th>@lang('supporters.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($supporters as $supporter)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$supporter"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.supporters.show', $supporter) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $supporter->name }}
                    </a>
                </td>

                <td>{{ $supporter->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.supporters.partials.actions.show')
                    @include('dashboard.supporters.partials.actions.restore')
                    @include('dashboard.supporters.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('supporters.empty')</td>
            </tr>
        @endforelse

        @if($supporters->hasPages())
            @slot('footer')
                {{ $supporters->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
