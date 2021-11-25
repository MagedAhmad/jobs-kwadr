<?php

Breadcrumbs::for('dashboard.owner_requests.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('owner_requests.plural'), route('dashboard.owner_requests.index'));
});

Breadcrumbs::for('dashboard.owner_requests.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.owner_requests.index');
    $breadcrumb->push(trans('owner_requests.actions.create'), route('dashboard.owner_requests.create'));
});

Breadcrumbs::for('dashboard.owner_requests.show', function ($breadcrumb, $ownerRequest) {
    $breadcrumb->parent('dashboard.owner_requests.index');
    $breadcrumb->push($ownerRequest->user->name, route('dashboard.owner_requests.show', $ownerRequest));
});

Breadcrumbs::for('dashboard.owner_requests.edit', function ($breadcrumb, $ownerRequest) {
    $breadcrumb->parent('dashboard.owner_requests.show', $ownerRequest);
    $breadcrumb->push(trans('owner_requests.actions.edit'), route('dashboard.owner_requests.edit', $ownerRequest));
});
