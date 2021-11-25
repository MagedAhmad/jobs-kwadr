<x-layout :title="$profile->name" :breadcrumbs="['dashboard.profiles.edit', $profile]">
    {{ BsForm::resource('profiles')->putModel($profile, route('dashboard.profiles.update', $profile)) }}
    @component('dashboard::components.box')
        @slot('title', trans('profiles.actions.edit'))

        @include('dashboard.profiles.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('profiles.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>