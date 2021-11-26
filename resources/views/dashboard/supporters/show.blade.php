<x-layout :title="$supporter->name" :breadcrumbs="['dashboard.supporters.show', $supporter]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    
                        <tr>
                            <th width="200">@lang("supporters.attributes.name")</th>
                            <td>{{ $supporter->name }}</td>
                        </tr>
            
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.supporters.partials.actions.edit')
                    @include('dashboard.supporters.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
