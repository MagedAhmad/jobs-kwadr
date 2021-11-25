<x-layout :title="$martial->name" :breadcrumbs="['dashboard.martials.show', $martial]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    
                        <tr>
                            <th width="200">@lang("martials.attributes.name")</th>
                            <td>{{ $martial->name }}</td>
                        </tr>
            
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.martials.partials.actions.edit')
                    @include('dashboard.martials.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
