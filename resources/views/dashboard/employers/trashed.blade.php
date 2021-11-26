<x-layout :title="trans('employers.trashed')" :breadcrumbs="['dashboard.employers.trashed']">
    @include('dashboard.employers.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('employers.actions.list') ({{ count_formatted($employers->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Employer::class }}"
                        :resource="trans('employers.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Employer::class }}"
                        :resource="trans('employers.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('employers.attributes.name')</th>
            <th>@lang('employers.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($employers as $employer)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$employer"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.employers.show', $employer) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $employer->name }}
                    </a>
                </td>

                <td>{{ $employer->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.employers.partials.actions.show')
                    @include('dashboard.employers.partials.actions.restore')
                    @include('dashboard.employers.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('employers.empty')</td>
            </tr>
        @endforelse

        @if($employers->hasPages())
            @slot('footer')
                {{ $employers->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
