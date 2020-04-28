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

Breadcrumbs::for('admin-create', function ($trail) {
    $trail->parent('admins');
    $trail->push('Добавить администратора', route('admin.create'));
});

Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Роли ' , route('role.index'));
});

Breadcrumbs::for('role-create', function ($trail) {
    $trail->parent('roles');
    $trail->push('Добавить роль', route('role.create'));
});
Breadcrumbs::for('role', function ($trail, $name) {
    $trail->parent('roles');
    $trail->push($name, route('role.show', $name));
});

Breadcrumbs::for('role-edit', function ($trail, $name) {
    $trail->parent('roles');
    $trail->push('Изменить данные ' . $name, route('role.edit', $name));
});

Breadcrumbs::for('products', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Товары ' , route('product.index'));
});

Breadcrumbs::for('product-create', function ($trail) {
    $trail->parent('products');
    $trail->push('Добавить товар ' , route('product.create'));
});
