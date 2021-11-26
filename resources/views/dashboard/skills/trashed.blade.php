<x-layout :title="trans('skills.trashed')" :breadcrumbs="['dashboard.skills.trashed']">
    @include('dashboard.skills.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('skills.actions.list') ({{ count_formatted($skills->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Skill::class }}"
                        :resource="trans('skills.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Skill::class }}"
                        :resource="trans('skills.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('skills.attributes.name')</th>
            <th>@lang('skills.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($skills as $skill)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$skill"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.skills.show', $skill) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $skill->name }}
                    </a>
                </td>

                <td>{{ $skill->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.skills.partials.actions.show')
                    @include('dashboard.skills.partials.actions.restore')
                    @include('dashboard.skills.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('skills.empty')</td>
            </tr>
        @endforelse

        @if($skills->hasPages())
            @slot('footer')
                {{ $skills->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
