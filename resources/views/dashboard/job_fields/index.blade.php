<x-layout :title="trans('job_fields.plural')" :breadcrumbs="['dashboard.job_fields.index']">
    @include('dashboard.job_fields.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('job_fields.actions.list') ({{ $job_fields->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                    type="{{ \App\Models\JobField::class }}"
                    :resource="trans('job_fields.plural')"></x-check-all-delete>
                <x-import-excel
                            model="{{ \App\Models\JobField::class }}"
                            import="{{ \App\Imports\JobFieldsImport::class }}"
                            exportResource="{{ App\Http\Resources\JobFieldResource::class }}"
                            :resource="trans('job_fields.plural')"></x-import-excel>
                <x-export-excel
                            model="{{ \App\Models\JobField::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\JobFieldResource::class }}"
                            fileName="JobFields"
                            ></x-export-excel>
                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.job_fields.partials.actions.create')
                    @include('dashboard.job_fields.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            
            <th>
                @lang("job_fields.attributes.name")
            </th>
            <th>@lang('job_fields.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($job_fields as $job_field)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$job_field"></x-check-all-item>
                </td>
                
                
                <td>{{ $job_field->name }}</td>
                <td>{{ $job_field->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.job_fields.partials.actions.show')
                    @include('dashboard.job_fields.partials.actions.edit')
                    @include('dashboard.job_fields.partials.actions.delete')
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
