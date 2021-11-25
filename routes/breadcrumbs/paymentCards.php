<?php

Breadcrumbs::for('dashboard.paymentCards.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('paymentCards.plural'), route('dashboard.paymentCards.index'));
});

Breadcrumbs::for('dashboard.paymentCards.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.paymentCards.index');
    $breadcrumb->push(trans('paymentCards.actions.create'), route('dashboard.paymentCards.create'));
});

Breadcrumbs::for('dashboard.paymentCards.show', function ($breadcrumb, $paymentCards) {
    $breadcrumb->parent('dashboard.paymentCards.index');
    $breadcrumb->push($paymentCards->card_name, route('dashboard.paymentCards.show', $paymentCards));
});

Breadcrumbs::for('dashboard.paymentCards.edit', function ($breadcrumb, $paymentCards) {
    $breadcrumb->parent('dashboard.paymentCards.show', $paymentCards);
    $breadcrumb->push(trans('paymentCards.actions.edit'), route('dashboard.paymentCards.edit', $paymentCards));
});
