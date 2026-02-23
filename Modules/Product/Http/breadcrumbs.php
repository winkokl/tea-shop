<?php

Breadcrumbs::for('admin.product.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('product::labels.backend.product.management'), route('admin.product.index'));
});

Breadcrumbs::for('admin.product.create', function ($trail) {
    $trail->parent('admin.product.index');
    $trail->push(__('product::labels.backend.product.create'), route('admin.product.create'));
});

Breadcrumbs::for('admin.product.show', function ($trail, $id) {
    $trail->parent('admin.product.index');
    $trail->push(__('product::labels.backend.product.show'), route('admin.product.show', $id));
});

Breadcrumbs::for('admin.product.edit', function ($trail, $id) {
    $trail->parent('admin.product.index');
    $trail->push(__('product::labels.backend.product.edit'), route('admin.product.edit', $id));
});
