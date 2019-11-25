<?php

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Главная', route('admin.dashboard.index'));
});

Breadcrumbs::for('admins', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Администраторы', route('admin.index'));
});

Breadcrumbs::for('admin', function ($trail, $name) {
    $trail->parent('admins');
    $trail->push($name, route('admin.show', $name));
});

Breadcrumbs::for('admin-edit', function ($trail, $name) {
    $trail->parent('admins');
    $trail->push('Изменить данные ' . $name, route('admin.edit', $name));
});
