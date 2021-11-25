<?php

// Home / Bank transfer
Breadcrumbs::register('dashboard.bankTransfers.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('bankTransfers.plural'), route('dashboard.bankTransfers.index'));
});

// Home / bankTransfer / {bankTransfer id}
Breadcrumbs::register('dashboard.bankTransfers.show', function ($breadcrumbs, $bankTransfer) {
    $breadcrumbs->parent('dashboard.bankTransfers.index');
    $breadcrumbs->push($bankTransfer->id, route('dashboard.bankTransfers.show', $bankTransfer));
});
