<?php

Breadcrumbs::for('dashboard.training_types.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('training_types.plural'), route('dashboard.training_types.index'));
});


Breadcrumbs::for('dashboard.training_types.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.training_types.index');
    $breadcrumb->push(trans('training_types.trashed'), route('dashboard.training_types.trashed'));
});


Breadcrumbs::for('dashboard.training_types.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.training_types.index');
    $breadcrumb->push(trans('training_types.actions.create'), route('dashboard.training_types.create'));
});

Breadcrumbs::for('dashboard.training_types.show', function ($breadcrumb, $training_type) {
    $breadcrumb->parent('dashboard.training_types.index');
    $breadcrumb->push(isset($training_type->name) ? $training_type->name : $training_type->id, route('dashboard.training_types.show', $training_type));
});

Breadcrumbs::for('dashboard.training_types.edit', function ($breadcrumb, $training_type) {
    $breadcrumb->parent('dashboard.training_types.show', $training_type);
    $breadcrumb->push(trans('training_types.actions.edit'), route('dashboard.training_types.edit', $training_type));
});



