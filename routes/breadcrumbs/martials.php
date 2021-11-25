<?php

Breadcrumbs::for('dashboard.martials.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('martials.plural'), route('dashboard.martials.index'));
});


Breadcrumbs::for('dashboard.martials.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.martials.index');
    $breadcrumb->push(trans('martials.trashed'), route('dashboard.martials.trashed'));
});


Breadcrumbs::for('dashboard.martials.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.martials.index');
    $breadcrumb->push(trans('martials.actions.create'), route('dashboard.martials.create'));
});

Breadcrumbs::for('dashboard.martials.show', function ($breadcrumb, $martial) {
    $breadcrumb->parent('dashboard.martials.index');
    $breadcrumb->push(isset($martial->name) ? $martial->name : $martial->id, route('dashboard.martials.show', $martial));
});

Breadcrumbs::for('dashboard.martials.edit', function ($breadcrumb, $martial) {
    $breadcrumb->parent('dashboard.martials.show', $martial);
    $breadcrumb->push(trans('martials.actions.edit'), route('dashboard.martials.edit', $martial));
});



