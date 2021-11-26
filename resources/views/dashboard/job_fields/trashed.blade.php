<x-layout :title="trans('job_fields.trashed')" :breadcrumbs="['dashboard.job_fields.trashed']">
    @include('dashboard.job_fields.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('job_fields.actions.list') ({{ count_formatted($job_fields->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\JobField::class }}"
                        :resource="trans('job_fields.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\JobField::class }}"
                        :resource="trans('job_fields.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('job_fields.attributes.name')</th>
            <th>@lang('job_fields.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($job_fields as $job_field)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$job_field"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.job_fields.show', $job_field) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $job_field->name }}
                    </a>
                </td>

                <td>{{ $job_field->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.job_fields.partials.actions.show')
                    @include('dashboard.job_fields.partials.actions.restore')
                    @include('dashboard.job_fields.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('job_fields.empty')</td>
            </tr>
        @endforelse

        @if($job_fields->hasPages())
            @slot('footer')
                {{ $job_fields->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
