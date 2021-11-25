<?php

Breadcrumbs::for('dashboard.answers.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('answers.plural'), route('dashboard.answers.index'));
});

Breadcrumbs::for('dashboard.answers.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.answers.index');
    $breadcrumb->push(trans('answers.actions.create'), route('dashboard.answers.create'));
});

Breadcrumbs::for('dashboard.answers.show', function ($breadcrumb, $answer) {
    $breadcrumb->parent('dashboard.answers.index');
    $breadcrumb->push($answer->id, route('dashboard.answers.show', $answer));
});

Breadcrumbs::for('dashboard.answers.edit', function ($breadcrumb, $answer) {
    $breadcrumb->parent('dashboard.answers.show', $answer);
    $breadcrumb->push(trans('answers.actions.edit'), route('dashboard.answers.edit', $answer));
});
