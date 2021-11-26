<x-layout :title="trans('job_types.plural')" :breadcrumbs="['dashboard.job_types.index']">
    @include('dashboard.job_types.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('job_types.actions.list') ({{ $job_types->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                    type="{{ \App\Models\JobType::class }}"
                    :resource="trans('job_types.plural')"></x-check-all-delete>
                <x-import-excel
                            model="{{ \App\Models\JobType::class }}"
                            import="{{ \App\Imports\JobTypesImport::class }}"
                            exportResource="{{ App\Http\Resources\JobTypeResource::class }}"
                            :resource="trans('job_types.plural')"></x-import-excel>
                <x-export-excel
                            model="{{ \App\Models\JobType::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\JobTypeResource::class }}"
                            fileName="JobTypes"
                            ></x-export-excel>
                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.job_types.partials.actions.create')
                    @include('dashboard.job_types.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            
            <th>
                @lang("job_types.attributes.name")
            </th>
            <th>@lang('job_types.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($job_types as $job_type)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$job_type"></x-check-all-item>
                </td>
                
                
                <td>{{ $job_type->name }}</td>
                <td>{{ $job_type->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.job_types.partials.actions.show')
                    @include('dashboard.job_types.partials.actions.edit')
                    @include('dashboard.job_types.partials.actions.delete')
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
