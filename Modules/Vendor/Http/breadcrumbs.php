<?php

Breadcrumbs::for('admin.vendor.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('vendor::labels.backend.vendor.management'), route('admin.vendor.index'));
});

Breadcrumbs::for('admin.vendor.create', function ($trail) {
    $trail->parent('admin.vendor.index');
    $trail->push(__('vendor::labels.backend.vendor.create'), route('admin.vendor.create'));
});

Breadcrumbs::for('admin.vendor.show', function ($trail, $id) {
    $trail->parent('admin.vendor.index');
    $trail->push(__('vendor::labels.backend.vendor.show'), route('admin.vendor.show', $id));
});

Breadcrumbs::for('admin.vendor.edit', function ($trail, $id) {
    $trail->parent('admin.vendor.index');
    $trail->push(__('vendor::labels.backend.vendor.edit'), route('admin.vendor.edit', $id));
});

Breadcrumbs::for('admin.deleted.vendor', function ($trail) {
    $trail->parent('admin.vendor.index');
    $trail->push(__('vendor::menus.backend.vendor.delete_vendor'), route('admin.deleted.vendor'));
});

Breadcrumbs::for('admin.vendor.import', function ($trail) {
    $trail->parent('admin.vendor.index');
    $trail->push(__('vendor::menus.backend.vendor.import_vendor'), route('admin.vendor.import'));
});