<x-layout :title="trans('education.trashed')" :breadcrumbs="['dashboard.education.trashed']">
    @include('dashboard.education.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('education.actions.list') ({{ count_formatted($education->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Education::class }}"
                        :resource="trans('education.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Education::class }}"
                        :resource="trans('education.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('education.attributes.name')</th>
            <th>@lang('education.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($education as $education)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$education"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.education.show', $education) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $education->name }}
                    </a>
                </td>

                <td>{{ $education->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.education.partials.actions.show')
                    @include('dashboard.education.partials.actions.restore')
                    @include('dashboard.education.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('education.empty')</td>
            </tr>
        @endforelse

        @if($education->hasPages())
            @slot('footer')
                {{ $education->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
