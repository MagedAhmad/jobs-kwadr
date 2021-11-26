<x-layout :title="$training_type->name" :breadcrumbs="['dashboard.training_types.edit', $training_type]">
    {{ BsForm::resource('training_types')->putModel($training_type, route('dashboard.training_types.update', $training_type)) }}
    @component('dashboard::components.box')
        @slot('title', trans('training_types.actions.edit'))

        @include('dashboard.training_types.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('training_types.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>