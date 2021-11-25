<?php

Breadcrumbs::for('dashboard.profiles.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('profiles.plural'), route('dashboard.profiles.index'));
});


Breadcrumbs::for('dashboard.profiles.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.profiles.index');
    $breadcrumb->push(trans('profiles.trashed'), route('dashboard.profiles.trashed'));
});


Breadcrumbs::for('dashboard.profiles.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.profiles.index');
    $breadcrumb->push(trans('profiles.actions.create'), route('dashboard.profiles.create'));
});

Breadcrumbs::for('dashboard.profiles.show', function ($breadcrumb, $profile) {
    $breadcrumb->parent('dashboard.profiles.index');
    $breadcrumb->push(isset($profile->name) ? $profile->name : $profile->id, route('dashboard.profiles.show', $profile));
});

Breadcrumbs::for('dashboard.profiles.edit', function ($breadcrumb, $profile) {
    $breadcrumb->parent('dashboard.profiles.show', $profile);
    $breadcrumb->push(trans('profiles.actions.edit'), route('dashboard.profiles.edit', $profile));
});



