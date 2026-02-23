<?php

Breadcrumbs::for('admin.recyclebin.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('recyclebin::labels.backend.recyclebin.management'), route('admin.recyclebin.index'));
});

Breadcrumbs::for('admin.recyclebin.create', function ($trail) {
    $trail->parent('admin.recyclebin.index');
    $trail->push(__('recyclebin::labels.backend.recyclebin.create'), route('admin.recyclebin.create'));
});

Breadcrumbs::for('admin.recyclebin.show', function ($trail, $id) {
    $trail->parent('admin.recyclebin.index');
    $trail->push(__('recyclebin::labels.backend.recyclebin.show'), route('admin.recyclebin.show', $id));
});

Breadcrumbs::for('admin.recyclebin.edit', function ($trail, $id) {
    $trail->parent('admin.recyclebin.index');
    $trail->push(__('recyclebin::labels.backend.recyclebin.edit'), route('admin.recyclebin.edit', $id));
});
