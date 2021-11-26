<x-layout :title="trans('skills.plural')" :breadcrumbs="['dashboard.skills.index']">
    @include('dashboard.skills.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('skills.actions.list') ({{ $skills->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                    type="{{ \App\Models\Skill::class }}"
                    :resource="trans('skills.plural')"></x-check-all-delete>
                <x-import-excel
                            model="{{ \App\Models\Skill::class }}"
                            import="{{ \App\Imports\SkillsImport::class }}"
                            exportResource="{{ App\Http\Resources\SkillResource::class }}"
                            :resource="trans('skills.plural')"></x-import-excel>
                <x-export-excel
                            model="{{ \App\Models\Skill::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\SkillResource::class }}"
                            fileName="Skills"
                            ></x-export-excel>
                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.skills.partials.actions.create')
                    @include('dashboard.skills.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            
            <th>
                @lang("skills.attributes.name")
            </th>
            <th>@lang('skills.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($skills as $skill)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$skill"></x-check-all-item>
                </td>
                
                
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.skills.partials.actions.show')
                    @include('dashboard.skills.partials.actions.edit')
                    @include('dashboard.skills.partials.actions.delete')
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
