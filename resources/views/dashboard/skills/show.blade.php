<x-layout :title="$skill->name" :breadcrumbs="['dashboard.skills.show', $skill]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    
                        <tr>
                            <th width="200">@lang("skills.attributes.name")</th>
                            <td>{{ $skill->name }}</td>
                        </tr>
            
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.skills.partials.actions.edit')
                    @include('dashboard.skills.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
