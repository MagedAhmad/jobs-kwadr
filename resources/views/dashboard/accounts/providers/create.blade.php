<x-layout :title="trans('providers.actions.create')" :breadcrumbs="['dashboard.providers.create']">
    {{ BsForm::resource('providers')->post(route('dashboard.providers.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('providers.actions.create'))

        @include('dashboard.accounts.providers.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('providers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
