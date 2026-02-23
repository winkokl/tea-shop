<?php

Breadcrumbs::for('admin.region.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('region::labels.backend.region.management'), route('admin.region.index'));
});

Breadcrumbs::for('admin.region.create', function ($trail) {
    $trail->parent('admin.region.index');
    $trail->push(__('region::labels.backend.region.create'), route('admin.region.create'));
});

Breadcrumbs::for('admin.region.show', function ($trail, $id) {
    $trail->parent('admin.region.index');
    $trail->push(__('region::labels.backend.region.show'), route('admin.region.show', $id));
});

Breadcrumbs::for('admin.region.edit', function ($trail, $id) {
    $trail->parent('admin.region.index');
    $trail->push(__('region::labels.backend.region.edit'), route('admin.region.edit', $id));
});
