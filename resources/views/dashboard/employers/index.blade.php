<x-layout :title="trans('employers.plural')" :breadcrumbs="['dashboard.employers.index']">
    @include('dashboard.employers.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('employers.actions.list') ({{ $employers->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                    type="{{ \App\Models\Employer::class }}"
                    :resource="trans('employers.plural')"></x-check-all-delete>
                <x-import-excel
                            model="{{ \App\Models\Employer::class }}"
                            import="{{ \App\Imports\EmployersImport::class }}"
                            exportResource="{{ App\Http\Resources\EmployerResource::class }}"
                            :resource="trans('employers.plural')"></x-import-excel>
                <x-export-excel
                            model="{{ \App\Models\Employer::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\EmployerResource::class }}"
                            fileName="Employers"
                            ></x-export-excel>
                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.employers.partials.actions.create')
                    @include('dashboard.employers.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            
            <th>
                @lang("employers.attributes.name")
            </th>
            <th>@lang('employers.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($employers as $employer)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$employer"></x-check-all-item>
                </td>
                
                
                <td>{{ $employer->name }}</td>
                <td>{{ $employer->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.employers.partials.actions.show')
                    @include('dashboard.employers.partials.actions.edit')
                    @include('dashboard.employers.partials.actions.delete')
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
