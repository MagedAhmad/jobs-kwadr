<?php

Breadcrumbs::for('dashboard.palaces.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('palaces.plural'), route('dashboard.palaces.index'));
});

Breadcrumbs::for('dashboard.palaces.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.palaces.index');
    $breadcrumb->push(trans('palaces.actions.create'), route('dashboard.palaces.create'));
});

Breadcrumbs::for('dashboard.palaces.show', function ($breadcrumb, $palace) {
    $breadcrumb->parent('dashboard.palaces.index');
    $breadcrumb->push($palace->name, route('dashboard.palaces.show', $palace));
});

Breadcrumbs::for('dashboard.palaces.edit', function ($breadcrumb, $palace) {
    $breadcrumb->parent('dashboard.palaces.show', $palace);
    $breadcrumb->push(trans('palaces.actions.edit'), route('dashboard.palaces.edit', $palace));
});
