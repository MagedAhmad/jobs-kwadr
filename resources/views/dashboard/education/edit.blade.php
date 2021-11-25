<x-layout :title="$education->name" :breadcrumbs="['dashboard.education.edit', $education]">
    {{ BsForm::resource('education')->putModel($education, route('dashboard.education.update', $education)) }}
    @component('dashboard::components.box')
        @slot('title', trans('education.actions.edit'))

        @include('dashboard.education.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('education.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>