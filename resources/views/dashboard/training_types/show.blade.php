<x-layout :title="$training_type->name" :breadcrumbs="['dashboard.training_types.show', $training_type]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    
                        <tr>
                            <th width="200">@lang("training_types.attributes.name")</th>
                            <td>{{ $training_type->name }}</td>
                        </tr>
            
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.training_types.partials.actions.edit')
                    @include('dashboard.training_types.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
