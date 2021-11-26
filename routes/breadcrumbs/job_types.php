<?php

Breadcrumbs::for('dashboard.job_types.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('job_types.plural'), route('dashboard.job_types.index'));
});


Breadcrumbs::for('dashboard.job_types.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.job_types.index');
    $breadcrumb->push(trans('job_types.trashed'), route('dashboard.job_types.trashed'));
});


Breadcrumbs::for('dashboard.job_types.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.job_types.index');
    $breadcrumb->push(trans('job_types.actions.create'), route('dashboard.job_types.create'));
});

Breadcrumbs::for('dashboard.job_types.show', function ($breadcrumb, $job_type) {
    $breadcrumb->parent('dashboard.job_types.index');
    $breadcrumb->push(isset($job_type->name) ? $job_type->name : $job_type->id, route('dashboard.job_types.show', $job_type));
});

Breadcrumbs::for('dashboard.job_types.edit', function ($breadcrumb, $job_type) {
    $breadcrumb->parent('dashboard.job_types.show', $job_type);
    $breadcrumb->push(trans('job_types.actions.edit'), route('dashboard.job_types.edit', $job_type));
});



