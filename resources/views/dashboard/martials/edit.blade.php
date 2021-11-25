<x-layout :title="$martial->name" :breadcrumbs="['dashboard.martials.edit', $martial]">
    {{ BsForm::resource('martials')->putModel($martial, route('dashboard.martials.update', $martial)) }}
    @component('dashboard::components.box')
        @slot('title', trans('martials.actions.edit'))

        @include('dashboard.martials.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('martials.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>