<x-layout :title="$supporter->name" :breadcrumbs="['dashboard.supporters.edit', $supporter]">
    {{ BsForm::resource('supporters')->putModel($supporter, route('dashboard.supporters.update', $supporter)) }}
    @component('dashboard::components.box')
        @slot('title', trans('supporters.actions.edit'))

        @include('dashboard.supporters.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('supporters.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>