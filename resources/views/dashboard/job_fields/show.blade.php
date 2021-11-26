<x-layout :title="$job_field->name" :breadcrumbs="['dashboard.job_fields.show', $job_field]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    
                        <tr>
                            <th width="200">@lang("job_fields.attributes.name")</th>
                            <td>{{ $job_field->name }}</td>
                        </tr>
            
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.job_fields.partials.actions.edit')
                    @include('dashboard.job_fields.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
