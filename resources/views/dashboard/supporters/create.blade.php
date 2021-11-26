<x-layout :title="trans('supporters.actions.create')" :breadcrumbs="['dashboard.supporters.create']">
    {{ BsForm::resource('supporters')->post(route('dashboard.supporters.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('supporters.actions.create'))

        @include('dashboard.supporters.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('supporters.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>