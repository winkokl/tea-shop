<?php

Breadcrumbs::for('admin.sms.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('sms::labels.backend.sms.management'), route('admin.sms.index'));
});

Breadcrumbs::for('admin.sms.create', function ($trail) {
    $trail->parent('admin.sms.index');
    $trail->push(__('sms::labels.backend.sms.create'), route('admin.sms.create'));
});

Breadcrumbs::for('admin.sms.show', function ($trail, $id) {
    $trail->parent('admin.sms.index');
    $trail->push(__('sms::labels.backend.sms.show'), route('admin.sms.show', $id));
});

Breadcrumbs::for('admin.sms.edit', function ($trail, $id) {
    $trail->parent('admin.sms.index');
    $trail->push(__('sms::labels.backend.sms.edit'), route('admin.sms.edit', $id));
});
