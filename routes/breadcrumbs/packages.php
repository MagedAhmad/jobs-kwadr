<?php

Breadcrumbs::for('dashboard.packages.index', function ($breadcrumb, $palace) {
    $breadcrumb->parent('dashboard.palaces.show', $palace);
    $breadcrumb->push(trans('packages.plural'), route('dashboard.packages.index', $palace));
});

Breadcrumbs::for('dashboard.packages.create', function ($breadcrumb, $palace) {
    $breadcrumb->parent('dashboard.packages.index', $palace);
    $breadcrumb->push(trans('packages.actions.create'), route('dashboard.packages.create', $palace));
});

Breadcrumbs::for('dashboard.packages.show', function ($breadcrumb, $palace, $package) {
    $breadcrumb->parent('dashboard.packages.index', $palace);
    $breadcrumb->push($package->name, route('dashboard.packages.show', [$palace, $package]));
});

Breadcrumbs::for('dashboard.packages.edit', function ($breadcrumb, $palace, $package) {
    $breadcrumb->parent('dashboard.packages.show', $palace, $package);
    $breadcrumb->push(trans('packages.actions.edit'), route('dashboard.packages.edit', [$palace, $package]));
});
