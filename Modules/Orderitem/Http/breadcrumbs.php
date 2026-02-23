<?php

Breadcrumbs::for('admin.orderitem.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('orderitem::labels.backend.orderitem.management'), route('admin.orderitem.index'));
});

Breadcrumbs::for('admin.orderitem.create', function ($trail) {
    $trail->parent('admin.orderitem.index');
    $trail->push(__('orderitem::labels.backend.orderitem.create'), route('admin.orderitem.create'));
});

Breadcrumbs::for('admin.orderitem.show', function ($trail, $id) {
    $trail->parent('admin.orderitem.index');
    $trail->push(__('orderitem::labels.backend.orderitem.show'), route('admin.orderitem.show', $id));
});

Breadcrumbs::for('admin.orderitem.edit', function ($trail, $id) {
    $trail->parent('admin.orderitem.index');
    $trail->push(__('orderitem::labels.backend.orderitem.edit'), route('admin.orderitem.edit', $id));
});
