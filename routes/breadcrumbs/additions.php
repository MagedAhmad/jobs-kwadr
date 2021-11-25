<?php

Breadcrumbs::for('dashboard.additions.index', function ($breadcrumb, $palace) {
    $breadcrumb->parent('dashboard.palaces.show', $palace);
    $breadcrumb->push(trans('additions.plural'), route('dashboard.additions.index', $palace));
});

Breadcrumbs::for('dashboard.additions.create', function ($breadcrumb, $palace) {
    $breadcrumb->parent('dashboard.additions.index', $palace);
    $breadcrumb->push(trans('additions.actions.create'), route('dashboard.additions.create', $palace));
});

Breadcrumbs::for('dashboard.additions.show', function ($breadcrumb, $palace, $addition) {
    $breadcrumb->parent('dashboard.additions.index', $palace);
    $breadcrumb->push($addition->name, route('dashboard.additions.show', [$palace, $addition]));
});

Breadcrumbs::for('dashboard.additions.edit', function ($breadcrumb, $palace, $addition) {
    $breadcrumb->parent('dashboard.additions.show', $palace, $addition);
    $breadcrumb->push(trans('additions.actions.edit'), route('dashboard.additions.edit', [$palace, $addition]));
});
