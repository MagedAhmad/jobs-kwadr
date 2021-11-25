<?php

Breadcrumbs::for('dashboard.providers.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('providers.plural'), route('dashboard.providers.index'));
});


Breadcrumbs::for('dashboard.providers.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.providers.index');
    $breadcrumb->push(trans('providers.trashed'), route('dashboard.providers.trashed'));
});


Breadcrumbs::for('dashboard.providers.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.providers.index');
    $breadcrumb->push(trans('providers.actions.create'), route('dashboard.providers.create'));
});

Breadcrumbs::for('dashboard.providers.show', function ($breadcrumb, $provider) {
    $breadcrumb->parent('dashboard.providers.index');
    $breadcrumb->push($provider->name, route('dashboard.providers.show', $provider));
});

Breadcrumbs::for('dashboard.providers.edit', function ($breadcrumb, $provider) {
    $breadcrumb->parent('dashboard.providers.show', $provider);
    $breadcrumb->push(trans('providers.actions.edit'), route('dashboard.providers.edit', $provider));
});



