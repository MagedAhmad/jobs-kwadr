<x-layout :title="trans('martials.plural')" :breadcrumbs="['dashboard.martials.index']">
    @include('dashboard.martials.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('martials.actions.list') ({{ $martials->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                    type="{{ \App\Models\Martial::class }}"
                    :resource="trans('martials.plural')"></x-check-all-delete>
                <x-import-excel
                            model="{{ \App\Models\Martial::class }}"
                            import="{{ \App\Imports\MartialsImport::class }}"
                            exportResource="{{ App\Http\Resources\MartialResource::class }}"
                            :resource="trans('martials.plural')"></x-import-excel>
                <x-export-excel
                            model="{{ \App\Models\Martial::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\MartialResource::class }}"
                            fileName="Martials"
                            ></x-export-excel>
                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.martials.partials.actions.create')
                    @include('dashboard.martials.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            
            <th>
                @lang("martials.attributes.name")
            </th>
            <th>@lang('martials.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($martials as $martial)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$martial"></x-check-all-item>
                </td>
                
                
                <td>{{ $martial->name }}</td>
                <td>{{ $martial->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.martials.partials.actions.show')
                    @include('dashboard.martials.partials.actions.edit')
                    @include('dashboard.martials.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('martials.empty')</td>
            </tr>
        @endforelse

        @if($martials->hasPages())
            @slot('footer')
                {{ $martials->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
