<?php

Breadcrumbs::for('dashboard.employers.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('employers.plural'), route('dashboard.employers.index'));
});


Breadcrumbs::for('dashboard.employers.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.employers.index');
    $breadcrumb->push(trans('employers.trashed'), route('dashboard.employers.trashed'));
});


Breadcrumbs::for('dashboard.employers.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.employers.index');
    $breadcrumb->push(trans('employers.actions.create'), route('dashboard.employers.create'));
});

Breadcrumbs::for('dashboard.employers.show', function ($breadcrumb, $employer) {
    $breadcrumb->parent('dashboard.employers.index');
    $breadcrumb->push(isset($employer->name) ? $employer->name : $employer->id, route('dashboard.employers.show', $employer));
});

Breadcrumbs::for('dashboard.employers.edit', function ($breadcrumb, $employer) {
    $breadcrumb->parent('dashboard.employers.show', $employer);
    $breadcrumb->push(trans('employers.actions.edit'), route('dashboard.employers.edit', $employer));
});



