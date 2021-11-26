<x-layout :title="trans('job_types.actions.create')" :breadcrumbs="['dashboard.job_types.create']">
    {{ BsForm::resource('job_types')->post(route('dashboard.job_types.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('job_types.actions.create'))

        @include('dashboard.job_types.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('job_types.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>