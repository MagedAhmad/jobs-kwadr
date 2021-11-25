<?php

// Home / Bank transfer
Breadcrumbs::register('dashboard.bills.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('bills.plural'), route('dashboard.bills.index'));
});

// Home / bill / {bill id}
Breadcrumbs::register('dashboard.bills.show', function ($breadcrumbs, $bill) {
    $breadcrumbs->parent('dashboard.bills.index');
    $breadcrumbs->push($bill->id, route('dashboard.bills.show', $bill));
});
