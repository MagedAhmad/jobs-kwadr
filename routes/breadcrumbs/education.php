<?php

Breadcrumbs::for('dashboard.education.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('education.plural'), route('dashboard.education.index'));
});


Breadcrumbs::for('dashboard.education.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.education.index');
    $breadcrumb->push(trans('education.trashed'), route('dashboard.education.trashed'));
});


Breadcrumbs::for('dashboard.education.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.education.index');
    $breadcrumb->push(trans('education.actions.create'), route('dashboard.education.create'));
});

Breadcrumbs::for('dashboard.education.show', function ($breadcrumb, $education) {
    $breadcrumb->parent('dashboard.education.index');
    $breadcrumb->push(isset($education->name) ? $education->name : $education->id, route('dashboard.education.show', $education));
});

Breadcrumbs::for('dashboard.education.edit', function ($breadcrumb, $education) {
    $breadcrumb->parent('dashboard.education.show', $education);
    $breadcrumb->push(trans('education.actions.edit'), route('dashboard.education.edit', $education));
});



