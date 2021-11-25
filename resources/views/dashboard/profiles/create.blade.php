<x-layout :title="trans('profiles.actions.create')" :breadcrumbs="['dashboard.profiles.create']">
    {{ BsForm::resource('profiles')->post(route('dashboard.profiles.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('profiles.actions.create'))

        @include('dashboard.profiles.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('profiles.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>