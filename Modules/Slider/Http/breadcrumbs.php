<?php

Breadcrumbs::for('admin.slider.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('slider::labels.backend.slider.management'), route('admin.slider.index'));
});

Breadcrumbs::for('admin.slider.create', function ($trail) {
    $trail->parent('admin.slider.index');
    $trail->push(__('slider::labels.backend.slider.create'), route('admin.slider.create'));
});

Breadcrumbs::for('admin.slider.show', function ($trail, $id) {
    $trail->parent('admin.slider.index');
    $trail->push(__('slider::labels.backend.slider.show'), route('admin.slider.show', $id));
});

Breadcrumbs::for('admin.slider.edit', function ($trail, $id) {
    $trail->parent('admin.slider.index');
    $trail->push(__('slider::labels.backend.slider.edit'), route('admin.slider.edit', $id));
});
