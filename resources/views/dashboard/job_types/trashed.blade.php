<x-layout :title="trans('job_types.trashed')" :breadcrumbs="['dashboard.job_types.trashed']">
    @include('dashboard.job_types.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('job_types.actions.list') ({{ count_formatted($job_types->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\JobType::class }}"
                        :resource="trans('job_types.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\JobType::class }}"
                        :resource="trans('job_types.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('job_types.attributes.name')</th>
            <th>@lang('job_types.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($job_types as $job_type)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$job_type"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.job_types.show', $job_type) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $job_type->name }}
                    </a>
                </td>

                <td>{{ $job_type->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.job_types.partials.actions.show')
                    @include('dashboard.job_types.partials.actions.restore')
                    @include('dashboard.job_types.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('job_types.empty')</td>
            </tr>
        @endforelse

        @if($job_types->hasPages())
            @slot('footer')
                {{ $job_types->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
