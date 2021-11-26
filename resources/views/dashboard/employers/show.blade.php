<x-layout :title="$employer->name" :breadcrumbs="['dashboard.employers.show', $employer]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    
                        <tr>
                            <th width="200">@lang("employers.attributes.name")</th>
                            <td>{{ $employer->name }}</td>
                        </tr>
            
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.employers.partials.actions.edit')
                    @include('dashboard.employers.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
