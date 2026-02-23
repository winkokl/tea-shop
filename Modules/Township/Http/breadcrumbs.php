<?php

Breadcrumbs::for('admin.township.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('township::labels.backend.township.management'), route('admin.township.index'));
});

Breadcrumbs::for('admin.township.create', function ($trail) {
    $trail->parent('admin.township.index');
    $trail->push(__('township::labels.backend.township.create'), route('admin.township.create'));
});

Breadcrumbs::for('admin.township.show', function ($trail, $id) {
    $trail->parent('admin.township.index');
    $trail->push(__('township::labels.backend.township.show'), route('admin.township.show', $id));
});

Breadcrumbs::for('admin.township.edit', function ($trail, $id) {
    $trail->parent('admin.township.index');
    $trail->push(__('township::labels.backend.township.edit'), route('admin.township.edit', $id));
});
