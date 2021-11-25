<x-layout :title="trans('education.actions.create')" :breadcrumbs="['dashboard.education.create']">
    {{ BsForm::resource('education')->post(route('dashboard.education.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('education.actions.create'))

        @include('dashboard.education.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('education.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>