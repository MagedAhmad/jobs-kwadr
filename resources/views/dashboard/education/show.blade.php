<x-layout :title="$education->name" :breadcrumbs="['dashboard.education.show', $education]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    
                        <tr>
                            <th width="200">@lang("education.attributes.name")</th>
                            <td>{{ $education->name }}</td>
                        </tr>
            
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.education.partials.actions.edit')
                    @include('dashboard.education.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
