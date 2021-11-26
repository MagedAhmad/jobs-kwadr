<x-layout :title="trans('supporters.plural')" :breadcrumbs="['dashboard.supporters.index']">
    @include('dashboard.supporters.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('supporters.actions.list') ({{ $supporters->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                    type="{{ \App\Models\Supporter::class }}"
                    :resource="trans('supporters.plural')"></x-check-all-delete>
                <x-import-excel
                            model="{{ \App\Models\Supporter::class }}"
                            import="{{ \App\Imports\SupportersImport::class }}"
                            exportResource="{{ App\Http\Resources\SupporterResource::class }}"
                            :resource="trans('supporters.plural')"></x-import-excel>
                <x-export-excel
                            model="{{ \App\Models\Supporter::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\SupporterResource::class }}"
                            fileName="Supporters"
                            ></x-export-excel>
                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.supporters.partials.actions.create')
                    @include('dashboard.supporters.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            
            <th>
                @lang("supporters.attributes.name")
            </th>
            <th>@lang('supporters.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($supporters as $supporter)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$supporter"></x-check-all-item>
                </td>
                
                
                <td>{{ $supporter->name }}</td>
                <td>{{ $supporter->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.supporters.partials.actions.show')
                    @include('dashboard.supporters.partials.actions.edit')
                    @include('dashboard.supporters.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('supporters.empty')</td>
            </tr>
        @endforelse

        @if($supporters->hasPages())
            @slot('footer')
                {{ $supporters->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
