<?php

Breadcrumbs::for('admin.cms.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('cms::labels.backend.cms.management'), route('admin.cms.index'));
});

Breadcrumbs::for('admin.cms.create', function ($trail) {
    $trail->parent('admin.cms.index');
    $trail->push(__('cms::labels.backend.cms.create'), route('admin.cms.create'));
});

Breadcrumbs::for('admin.cms.show', function ($trail, $id) {
    $trail->parent('admin.cms.index');
    $trail->push(__('cms::labels.backend.cms.show'), route('admin.cms.show', $id));
});

Breadcrumbs::for('admin.cms.edit', function ($trail, $id) {
    $trail->parent('admin.cms.index');
    $trail->push(__('cms::labels.backend.cms.edit'), route('admin.cms.edit', $id));
});
