<x-layout :title="trans('training_types.actions.create')" :breadcrumbs="['dashboard.training_types.create']">
    {{ BsForm::resource('training_types')->post(route('dashboard.training_types.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('training_types.actions.create'))

        @include('dashboard.training_types.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('training_types.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>