<x-layout :title="$job_type->name" :breadcrumbs="['dashboard.job_types.edit', $job_type]">
    {{ BsForm::resource('job_types')->putModel($job_type, route('dashboard.job_types.update', $job_type)) }}
    @component('dashboard::components.box')
        @slot('title', trans('job_types.actions.edit'))

        @include('dashboard.job_types.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('job_types.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>