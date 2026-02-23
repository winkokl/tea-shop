<?php

Breadcrumbs::for('admin.city.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('city::labels.backend.city.management'), route('admin.city.index'));
});

Breadcrumbs::for('admin.city.create', function ($trail) {
    $trail->parent('admin.city.index');
    $trail->push(__('city::labels.backend.city.create'), route('admin.city.create'));
});

Breadcrumbs::for('admin.city.show', function ($trail, $id) {
    $trail->parent('admin.city.index');
    $trail->push(__('city::labels.backend.city.show'), route('admin.city.show', $id));
});

Breadcrumbs::for('admin.city.edit', function ($trail, $id) {
    $trail->parent('admin.city.index');
    $trail->push(__('city::labels.backend.city.edit'), route('admin.city.edit', $id));
});
