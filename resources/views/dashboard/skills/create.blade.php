<x-layout :title="trans('skills.actions.create')" :breadcrumbs="['dashboard.skills.create']">
    {{ BsForm::resource('skills')->post(route('dashboard.skills.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('skills.actions.create'))

        @include('dashboard.skills.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('skills.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>