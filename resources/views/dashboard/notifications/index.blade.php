<x-layout :title="trans('notifications.plural')" :breadcrumbs="['dashboard.notifications.index']">

    @component('dashboard::components.table-box')
        @slot('title', trans('notifications.plural'))
        @slot('tools')
            @include('dashboard.notifications.partials.actions.create')
        @endslot
        <thead>
        <tr>
            <th>@lang('notifications.attributes.title')</th>
            <th>@lang('notifications.attributes.body')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($notifications as $notification)
            <tr>
                <td>
                    <a href="{{ route('dashboard.notifications.show', $notification) }}"
                       class="text-decoration-none text-ellipsis">

                        {{ $notification->data['title'] ?? trans('notifications.attributes.title') }}
                    </a>
                </td>
                <td>
                        {{ $notification->data['body'] ?? trans('notifications.attributes.body') }}
                </td>

                <td style="width: 160px">
                    @include('dashboard.notifications.partials.actions.show')
                 
                    @include('dashboard.notifications.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('notifications.empty')</td>
            </tr>
        @endforelse

        @if($notifications->hasPages())
            @slot('footer')
                {{ $notifications->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
