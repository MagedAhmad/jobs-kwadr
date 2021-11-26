<?php

Breadcrumbs::for('dashboard.skills.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('skills.plural'), route('dashboard.skills.index'));
});


Breadcrumbs::for('dashboard.skills.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.skills.index');
    $breadcrumb->push(trans('skills.trashed'), route('dashboard.skills.trashed'));
});


Breadcrumbs::for('dashboard.skills.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.skills.index');
    $breadcrumb->push(trans('skills.actions.create'), route('dashboard.skills.create'));
});

Breadcrumbs::for('dashboard.skills.show', function ($breadcrumb, $skill) {
    $breadcrumb->parent('dashboard.skills.index');
    $breadcrumb->push(isset($skill->name) ? $skill->name : $skill->id, route('dashboard.skills.show', $skill));
});

Breadcrumbs::for('dashboard.skills.edit', function ($breadcrumb, $skill) {
    $breadcrumb->parent('dashboard.skills.show', $skill);
    $breadcrumb->push(trans('skills.actions.edit'), route('dashboard.skills.edit', $skill));
});



