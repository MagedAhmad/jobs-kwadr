<?php

Breadcrumbs::for('dashboard.payments.index', function ($breadcrumb, $booking) {
    $breadcrumb->parent('dashboard.bookings.show', $booking);
    $breadcrumb->push(trans('payments.plural'), route('dashboard.payments.index', $booking));
});

Breadcrumbs::for('dashboard.payments.create', function ($breadcrumb, $booking) {
    $breadcrumb->parent('dashboard.payments.index', $booking);
    $breadcrumb->push(trans('payments.actions.create'), route('dashboard.payments.create', $booking));
});

Breadcrumbs::for('dashboard.payments.show', function ($breadcrumb, $payment) {
    $breadcrumb->parent('dashboard.bookings.show', $payment->booking);
    $breadcrumb->push(__('payments.plural') . ' / '. $payment->id, route('dashboard.payments.show', [$payment->booking, $payment]));
});

Breadcrumbs::for('dashboard.payments.edit', function ($breadcrumb, $payment) {
    $breadcrumb->parent('dashboard.payments.show', $payment);
    $breadcrumb->push(trans('payments.actions.edit'), route('dashboard.payments.edit', [$payment->booking, $payment]));
});
