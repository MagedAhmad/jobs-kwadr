<x-layout :title="trans('employers.actions.create')" :breadcrumbs="['dashboard.employers.create']">
    {{ BsForm::resource('employers')->post(route('dashboard.employers.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('employers.actions.create'))

        @include('dashboard.employers.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('employers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>