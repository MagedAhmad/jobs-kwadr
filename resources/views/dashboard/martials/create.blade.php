<x-layout :title="trans('martials.actions.create')" :breadcrumbs="['dashboard.martials.create']">
    {{ BsForm::resource('martials')->post(route('dashboard.martials.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('martials.actions.create'))

        @include('dashboard.martials.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('martials.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>