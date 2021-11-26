<x-layout :title="$job_field->name" :breadcrumbs="['dashboard.job_fields.edit', $job_field]">
    {{ BsForm::resource('job_fields')->putModel($job_field, route('dashboard.job_fields.update', $job_field)) }}
    @component('dashboard::components.box')
        @slot('title', trans('job_fields.actions.edit'))

        @include('dashboard.job_fields.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('job_fields.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>