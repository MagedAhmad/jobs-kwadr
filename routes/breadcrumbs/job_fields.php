<?php

Breadcrumbs::for('dashboard.job_fields.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('job_fields.plural'), route('dashboard.job_fields.index'));
});


Breadcrumbs::for('dashboard.job_fields.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.job_fields.index');
    $breadcrumb->push(trans('job_fields.trashed'), route('dashboard.job_fields.trashed'));
});


Breadcrumbs::for('dashboard.job_fields.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.job_fields.index');
    $breadcrumb->push(trans('job_fields.actions.create'), route('dashboard.job_fields.create'));
});

Breadcrumbs::for('dashboard.job_fields.show', function ($breadcrumb, $job_field) {
    $breadcrumb->parent('dashboard.job_fields.index');
    $breadcrumb->push(isset($job_field->name) ? $job_field->name : $job_field->id, route('dashboard.job_fields.show', $job_field));
});

Breadcrumbs::for('dashboard.job_fields.edit', function ($breadcrumb, $job_field) {
    $breadcrumb->parent('dashboard.job_fields.show', $job_field);
    $breadcrumb->push(trans('job_fields.actions.edit'), route('dashboard.job_fields.edit', $job_field));
});



