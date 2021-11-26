<x-layout :title="$job_type->name" :breadcrumbs="['dashboard.job_types.show', $job_type]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    
                        <tr>
                            <th width="200">@lang("job_types.attributes.name")</th>
                            <td>{{ $job_type->name }}</td>
                        </tr>
            
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.job_types.partials.actions.edit')
                    @include('dashboard.job_types.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
