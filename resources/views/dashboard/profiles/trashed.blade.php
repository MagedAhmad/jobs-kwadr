<x-layout :title="trans('profiles.trashed')" :breadcrumbs="['dashboard.profiles.trashed']">
    @include('dashboard.profiles.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('profiles.actions.list') ({{ count_formatted($profiles->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Profile::class }}"
                        :resource="trans('profiles.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Profile::class }}"
                        :resource="trans('profiles.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>
                @lang("profiles.attributes.first_name")
            </th>
            <th>
                @lang("profiles.attributes.father_name")
            </th>
            <th>
                @lang("profiles.attributes.grandfather_name")
            </th>
            <th>
                @lang("profiles.attributes.family_name")
            </th>
            <th>
                @lang("profiles.attributes.gender")
            </th>
            <th>
                @lang("profiles.attributes.id_number")
            </th>
            <th>
                @lang("profiles.attributes.social_security_number")
            </th>
            <th>
                @lang("profiles.attributes.phone")
            </th>
            <th>
                @lang("profiles.attributes.email")
            </th>
            <th>
                @lang("profiles.attributes.has_disability")
            </th>
            <th>
                @lang("profiles.attributes.has_driving_license")
            </th>
            <th>@lang('profiles.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($profiles as $profile)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$profile"></x-check-all-item>
                </td>
                <td>{{ $profile->first_name }}</td>
            
                <td>{{ $profile->father_name }}</td>
            
                <td>{{ $profile->grandfather_name }}</td>
            
                <td>{{ $profile->family_name }}</td>
            
                <td>{{ $profile->gender }}</td>
            
                <td>{{ $profile->id_number }}</td>
            
                <td>{{ $profile->social_security_number }}</td>
            
                <td>{{ $profile->phone }}</td>
            
                <td>{{ $profile->email }}</td>
            
                <td>{{ $profile->has_disability }}</td>
            
                <td>{{ $profile->has_driving_license }}</td>

                <td>{{ $profile->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.profiles.partials.actions.show')
                    @include('dashboard.profiles.partials.actions.restore')
                    @include('dashboard.profiles.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('profiles.empty')</td>
            </tr>
        @endforelse

        @if($profiles->hasPages())
            @slot('footer')
                {{ $profiles->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
