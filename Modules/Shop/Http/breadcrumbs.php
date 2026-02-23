<?php

Breadcrumbs::for('admin.shop.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('shop::labels.backend.shop.management'), route('admin.shop.index'));
});

Breadcrumbs::for('admin.shop.create', function ($trail) {
    $trail->parent('admin.shop.index');
    $trail->push(__('shop::labels.backend.shop.create'), route('admin.shop.create'));
});

Breadcrumbs::for('admin.shop.show', function ($trail, $id) {
    $trail->parent('admin.shop.index');
    $trail->push(__('shop::labels.backend.shop.show'), route('admin.shop.show', $id));
});

Breadcrumbs::for('admin.shop.edit', function ($trail, $id) {
    $trail->parent('admin.shop.index');
    $trail->push(__('shop::labels.backend.shop.edit'), route('admin.shop.edit', $id));
});
