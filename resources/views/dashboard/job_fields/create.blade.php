<x-layout :title="trans('job_fields.actions.create')" :breadcrumbs="['dashboard.job_fields.create']">
    {{ BsForm::resource('job_fields')->post(route('dashboard.job_fields.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('job_fields.actions.create'))

        @include('dashboard.job_fields.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('job_fields.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>