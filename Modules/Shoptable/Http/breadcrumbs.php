<?php

Breadcrumbs::for('admin.shoptable.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('shoptable::labels.backend.shoptable.management'), route('admin.shoptable.index'));
});

Breadcrumbs::for('admin.shoptable.create', function ($trail) {
    $trail->parent('admin.shoptable.index');
    $trail->push(__('shoptable::labels.backend.shoptable.create'), route('admin.shoptable.create'));
});

Breadcrumbs::for('admin.shoptable.show', function ($trail, $id) {
    $trail->parent('admin.shoptable.index');
    $trail->push(__('shoptable::labels.backend.shoptable.show'), route('admin.shoptable.show', $id));
});

Breadcrumbs::for('admin.shoptable.edit', function ($trail, $id) {
    $trail->parent('admin.shoptable.index');
    $trail->push(__('shoptable::labels.backend.shoptable.edit'), route('admin.shoptable.edit', $id));
});
