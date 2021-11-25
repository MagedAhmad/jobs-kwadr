<x-layout :title="trans('education.plural')" :breadcrumbs="['dashboard.education.index']">
    @include('dashboard.education.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('education.actions.list') ({{ $educations->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                    type="{{ \App\Models\Education::class }}"
                    :resource="trans('education.plural')"></x-check-all-delete>
                <x-import-excel
                            model="{{ \App\Models\Education::class }}"
                            import="{{ \App\Imports\EducationImport::class }}"
                            exportResource="{{ App\Http\Resources\EducationResource::class }}"
                            :resource="trans('education.plural')"></x-import-excel>
                <x-export-excel
                            model="{{ \App\Models\Education::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\EducationResource::class }}"
                            fileName="Education"
                            ></x-export-excel>
                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.education.partials.actions.create')
                    @include('dashboard.education.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>

            <th>
                @lang("education.attributes.name")
            </th>
            <th>@lang('education.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($educations as $education)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$education"></x-check-all-item>
                </td>


                <td>{{ $education->name }}</td>
                <td>{{ $education->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.education.partials.actions.show')
                    @include('dashboard.education.partials.actions.edit')
                    @include('dashboard.education.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('education.empty')</td>
            </tr>
        @endforelse

        @if($educations->hasPages())
            @slot('footer')
                {{ $educations->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
