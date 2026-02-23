<?php

Breadcrumbs::for('admin.employee.index', function ($trail) {
    $trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('employee::labels.backend.employee.management'), route('admin.employee.index'));
});

Breadcrumbs::for('admin.employee.create', function ($trail) {
    $trail->parent('admin.employee.index');
    $trail->push(__('employee::labels.backend.employee.create'), route('admin.employee.create'));
});

Breadcrumbs::for('admin.employee.show', function ($trail, $id) {
    $trail->parent('admin.employee.index');
    $trail->push(__('employee::labels.backend.employee.show'), route('admin.employee.show', $id));
});

Breadcrumbs::for('admin.employee.edit', function ($trail, $id) {
    $trail->parent('admin.employee.index');
    $trail->push(__('employee::labels.backend.employee.edit'), route('admin.employee.edit', $id));
});
