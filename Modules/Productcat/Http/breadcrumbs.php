<?php

Breadcrumbs::for('admin.productcat.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('productcat::labels.backend.productcat.management'), route('admin.productcat.index'));
});

Breadcrumbs::for('admin.productcat.create', function ($trail) {
    $trail->parent('admin.productcat.index');
    $trail->push(__('productcat::labels.backend.productcat.create'), route('admin.productcat.create'));
});

Breadcrumbs::for('admin.productcat.show', function ($trail, $id) {
    $trail->parent('admin.productcat.index');
    $trail->push(__('productcat::labels.backend.productcat.show'), route('admin.productcat.show', $id));
});

Breadcrumbs::for('admin.productcat.edit', function ($trail, $id) {
    $trail->parent('admin.productcat.index');
    $trail->push(__('productcat::labels.backend.productcat.edit'), route('admin.productcat.edit', $id));
});
