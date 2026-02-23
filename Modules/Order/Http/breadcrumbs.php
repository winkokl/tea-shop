<?php

Breadcrumbs::for('admin.order.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('order::labels.backend.order.management'), route('admin.order.index'));
});

Breadcrumbs::for('admin.order.create', function ($trail) {
    $trail->parent('admin.order.index');
    $trail->push(__('order::labels.backend.order.create'), route('admin.order.create'));
});

Breadcrumbs::for('admin.order.show', function ($trail, $id) {
    $trail->parent('admin.order.index');
    $trail->push(__('order::labels.backend.order.show'), route('admin.order.show', $id));
});

Breadcrumbs::for('admin.order.edit', function ($trail, $id) {
    $trail->parent('admin.order.index');
    $trail->push(__('order::labels.backend.order.edit'), route('admin.order.edit', $id));
});
