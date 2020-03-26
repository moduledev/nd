<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-show',

            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'admin-show',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'product-show',

            'permission-assign',
            'permission-revoke',

            'role-assign',
            'role-revoke',
            'role-show',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
        ];
        foreach ($permissions as $permission) {
//            Permission::create(['name' => $permission]);
            Permission::updateOrCreate(['name' => $permission]);
        }
    }
}
