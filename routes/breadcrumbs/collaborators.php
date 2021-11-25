<?php

Breadcrumbs::for('dashboard.collaborators.index', function ($breadcrumb, $palace) {
    $breadcrumb->parent('dashboard.palaces.show', $palace);
    $breadcrumb->push(trans('collaborators.plural'), route('dashboard.collaborators.index', $palace));
});

Breadcrumbs::for('dashboard.collaborators.create', function ($breadcrumb, $palace) {
    $breadcrumb->parent('dashboard.collaborators.index', $palace);
    $breadcrumb->push(trans('collaborators.actions.create'), route('dashboard.collaborators.create', $palace));
});

Breadcrumbs::for('dashboard.collaborators.show', function ($breadcrumb, $palace, $addition) {
    $breadcrumb->parent('dashboard.collaborators.index', $palace);
    $breadcrumb->push($addition->name, route('dashboard.collaborators.show', [$palace, $addition]));
});

Breadcrumbs::for('dashboard.collaborators.edit', function ($breadcrumb, $palace, $addition) {
    $breadcrumb->parent('dashboard.collaborators.show', $palace, $addition);
    $breadcrumb->push(trans('collaborators.actions.edit'), route('dashboard.collaborators.edit', [$palace, $addition]));
});
