<x-layout :title="trans('providers.plural')" :breadcrumbs="['dashboard.providers.index']">
    @include('dashboard.accounts.providers.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('providers.actions.list') ({{ count_formatted($providers->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\Provider::class }}"
                            :resource="trans('providers.plural')"></x-check-all-delete>
                    <x-import-excel
                            model="{{ \App\Models\Provider::class }}"
                            import="{{ \App\Imports\ProvidersImport::class }}"
                            :resource="trans('providers.plural')"></x-import-excel>
                    <x-export-excel
                            model="{{ \App\Models\Provider::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\ProviderResource::class }}"
                            fileName="Providers"
                            ></x-export-excel>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        @include('dashboard.accounts.providers.partials.actions.create')
                        @include('dashboard.accounts.providers.partials.actions.trashed')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('providers.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('providers.attributes.email')</th>
            <th>@lang('providers.attributes.phone')</th>
            <th>@lang('providers.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($providers as $provider)
            <tr>
                <td>
                    <x-check-all-item :model="$provider"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.providers.show', $provider) }}"
                       class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('dashboard.accounts.providers.partials.flags.svg')
                            </span>
                        <img src="{{ $provider->getAvatar() }}"
                             alt="Product 1"
                             class="img-circle img-size-32 mr-2">
                        {{ $provider->name }}
                    </a>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $provider->email }}
                </td>
                <td>
                    {{ $provider->phone }}
                </td>
                <td>{{ $provider->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.providers.partials.actions.show')
                    @include('dashboard.accounts.providers.partials.actions.edit')
                    @include('dashboard.accounts.providers.partials.actions.status')
                    @include('dashboard.accounts.providers.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('providers.empty')</td>
            </tr>
        @endforelse

        @if($providers->hasPages())
            @slot('footer')
                {{ $providers->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
