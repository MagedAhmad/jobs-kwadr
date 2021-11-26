<x-layout :title="$skill->name" :breadcrumbs="['dashboard.skills.edit', $skill]">
    {{ BsForm::resource('skills')->putModel($skill, route('dashboard.skills.update', $skill)) }}
    @component('dashboard::components.box')
        @slot('title', trans('skills.actions.edit'))

        @include('dashboard.skills.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('skills.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>