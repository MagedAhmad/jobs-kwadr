<?php

Breadcrumbs::for('dashboard.facilities.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('facilities.plural'), route('dashboard.facilities.index'));
});

Breadcrumbs::for('dashboard.facilities.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.facilities.index');
    $breadcrumb->push(trans('facilities.actions.create'), route('dashboard.facilities.create'));
});

Breadcrumbs::for('dashboard.facilities.show', function ($breadcrumb, $facility) {
    $breadcrumb->parent('dashboard.facilities.index');
    $breadcrumb->push($facility->name, route('dashboard.facilities.show', $facility));
});

Breadcrumbs::for('dashboard.facilities.edit', function ($breadcrumb, $facility) {
    $breadcrumb->parent('dashboard.facilities.show', $facility);
    $breadcrumb->push(trans('facilities.actions.edit'), route('dashboard.facilities.edit', $facility));
});
