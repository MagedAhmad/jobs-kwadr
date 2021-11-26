@component('dashboard::components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard.home'))
    @slot('icon', 'fas fa-tachometer-alt')
    @slot('active', request()->routeIs('dashboard.home'))
@endcomponent

@include('dashboard.accounts.sidebar')
@include('dashboard.countries.partials.actions.sidebar')
{{--@include('dashboard.pages.partials.actions.sidebar')--}}
{{--@include('dashboard.categories.partials.actions.sidebar')--}}
{{--@include('dashboard.notifications.sidebar')--}}

@include('dashboard.profiles.partials.actions.sidebar')
@include('dashboard.martials.partials.actions.sidebar')
@include('dashboard.education.partials.actions.sidebar')
@include('dashboard.job_types.partials.actions.sidebar')
@include('dashboard.job_fields.partials.actions.sidebar')
@include('dashboard.skills.partials.actions.sidebar')
{{-- The sidebar of generated crud will set here: Don't remove this line --}}
{{--@include('dashboard.feedback.partials.actions.sidebar')--}}
@include('dashboard.settings.sidebar')
