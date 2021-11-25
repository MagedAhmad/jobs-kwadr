<?php

Breadcrumbs::for('dashboard.cards.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('cards.plural'), route('dashboard.cards.index'));
});

Breadcrumbs::for('dashboard.cards.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.cards.index');
    $breadcrumb->push(trans('cards.actions.create'), route('dashboard.cards.create'));
});

Breadcrumbs::for('dashboard.cards.show', function ($breadcrumb, $card) {
    $breadcrumb->parent('dashboard.cards.index');
    $breadcrumb->push($card->title, route('dashboard.cards.show', $card));
});

Breadcrumbs::for('dashboard.cards.edit', function ($breadcrumb, $card) {
    $breadcrumb->parent('dashboard.cards.show', $card);
    $breadcrumb->push(trans('cards.actions.edit'), route('dashboard.cards.edit', $card));
});
