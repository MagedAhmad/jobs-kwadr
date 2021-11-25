<x-layout :title="$provider->name" :breadcrumbs="['dashboard.providers.show', $provider]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('providers.attributes.name')</th>
                <td>{{ $provider->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('providers.attributes.email')</th>
                <td>{{ $provider->email }}</td>
            </tr>
            <tr>
                <th width="200">@lang('providers.attributes.phone')</th>
                <td>
                    {{ $provider->phone }}
                </td>
            </tr>
            <tr>
                <th width="200">@lang('providers.attributes.avatar')</th>
                <td>
                    @if($provider->getFirstMedia('avatars'))
                        <file-preview :media="{{ $provider->getMediaResource('avatars') }}"></file-preview>
                    @else
                        <img src="{{ $provider->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $provider->name }}">
                    @endif
                </td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.accounts.providers.partials.actions.edit')
            @include('dashboard.accounts.providers.partials.actions.delete')
            @include('dashboard.accounts.providers.partials.actions.restore')
            @include('dashboard.accounts.providers.partials.actions.forceDelete')
        @endslot
    @endcomponent
</x-layout>
