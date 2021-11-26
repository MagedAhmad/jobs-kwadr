<?php

Breadcrumbs::for('dashboard.supporters.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('supporters.plural'), route('dashboard.supporters.index'));
});


Breadcrumbs::for('dashboard.supporters.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.supporters.index');
    $breadcrumb->push(trans('supporters.trashed'), route('dashboard.supporters.trashed'));
});


Breadcrumbs::for('dashboard.supporters.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.supporters.index');
    $breadcrumb->push(trans('supporters.actions.create'), route('dashboard.supporters.create'));
});

Breadcrumbs::for('dashboard.supporters.show', function ($breadcrumb, $supporter) {
    $breadcrumb->parent('dashboard.supporters.index');
    $breadcrumb->push(isset($supporter->name) ? $supporter->name : $supporter->id, route('dashboard.supporters.show', $supporter));
});

Breadcrumbs::for('dashboard.supporters.edit', function ($breadcrumb, $supporter) {
    $breadcrumb->parent('dashboard.supporters.show', $supporter);
    $breadcrumb->push(trans('supporters.actions.edit'), route('dashboard.supporters.edit', $supporter));
});



