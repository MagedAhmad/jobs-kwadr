<x-layout :title="trans('profiles.plural')" :breadcrumbs="['dashboard.profiles.index']">
    @include('dashboard.profiles.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('profiles.actions.list') ({{ $profiles->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                    type="{{ \App\Models\Profile::class }}"
                    :resource="trans('profiles.plural')"></x-check-all-delete>
                <x-import-excel
                            model="{{ \App\Models\Profile::class }}"
                            import="{{ \App\Imports\ProfilesImport::class }}"
                            exportResource="{{ App\Http\Resources\ProfileResource::class }}"
                            :resource="trans('profiles.plural')"></x-import-excel>
                <x-export-excel
                            model="{{ \App\Models\Profile::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\ProfileResource::class }}"
                            fileName="Profiles"
                            ></x-export-excel>
                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.profiles.partials.actions.create')
                    @include('dashboard.profiles.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
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
            
                <td>
                    @if($profile->gender == __('profiles.gender.male'))
                        <i class="fa fa-male fa-lg"></i>
                    @else 
                        <i class="fa fa-female fa-lg"></i>
                    @endif
                </td>
            
                <td>{{ $profile->id_number }}</td>
            
                <td>{{ $profile->social_security_number }}</td>
            
                <td>{{ $profile->phone }}</td>
            
                <td>{{ $profile->email }}</td>
            
            
                <td style="width: 160px">
                    @include('dashboard.profiles.partials.actions.show')
                    @include('dashboard.profiles.partials.actions.edit')
                    @include('dashboard.profiles.partials.actions.delete')
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
