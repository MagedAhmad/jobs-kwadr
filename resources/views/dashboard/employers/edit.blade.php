<x-layout :title="$employer->name" :breadcrumbs="['dashboard.employers.edit', $employer]">
    {{ BsForm::resource('employers')->putModel($employer, route('dashboard.employers.update', $employer)) }}
    @component('dashboard::components.box')
        @slot('title', trans('employers.actions.edit'))

        @include('dashboard.employers.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('employers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>