<x-layout :title="trans('training_types.plural')" :breadcrumbs="['dashboard.training_types.index']">
    @include('dashboard.training_types.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('training_types.actions.list') ({{ $training_types->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                    type="{{ \App\Models\TrainingType::class }}"
                    :resource="trans('training_types.plural')"></x-check-all-delete>
                <x-import-excel
                            model="{{ \App\Models\TrainingType::class }}"
                            import="{{ \App\Imports\TrainingTypesImport::class }}"
                            exportResource="{{ App\Http\Resources\TrainingTypeResource::class }}"
                            :resource="trans('training_types.plural')"></x-import-excel>
                <x-export-excel
                            model="{{ \App\Models\TrainingType::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\TrainingTypeResource::class }}"
                            fileName="TrainingTypes"
                            ></x-export-excel>
                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.training_types.partials.actions.create')
                    @include('dashboard.training_types.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            
            <th>
                @lang("training_types.attributes.name")
            </th>
            <th>@lang('training_types.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($training_types as $training_type)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$training_type"></x-check-all-item>
                </td>
                
                
                <td>{{ $training_type->name }}</td>
                <td>{{ $training_type->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.training_types.partials.actions.show')
                    @include('dashboard.training_types.partials.actions.edit')
                    @include('dashboard.training_types.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('training_types.empty')</td>
            </tr>
        @endforelse

        @if($training_types->hasPages())
            @slot('footer')
                {{ $training_types->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
