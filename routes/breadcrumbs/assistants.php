<?php

Breadcrumbs::for('dashboard.assistants.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('assistants.plural'), route('dashboard.assistants.index'));
});

Breadcrumbs::for('dashboard.assistants.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.assistants.index');
    $breadcrumb->push(trans('assistants.trashed'), route('dashboard.assistants.trashed'));
});

Breadcrumbs::for('dashboard.assistants.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.assistants.index');
    $breadcrumb->push(trans('assistants.actions.create'), route('dashboard.assistants.create'));
});

Breadcrumbs::for('dashboard.assistants.show', function ($breadcrumb, $assistant) {
    $breadcrumb->parent('dashboard.assistants.index');
    $breadcrumb->push($assistant->name, route('dashboard.assistants.show', $assistant));
});

Breadcrumbs::for('dashboard.assistants.edit', function ($breadcrumb, $assistant) {
    $breadcrumb->parent('dashboard.assistants.show', $assistant);
    $breadcrumb->push(trans('assistants.actions.edit'), route('dashboard.assistants.edit', $assistant));
});
