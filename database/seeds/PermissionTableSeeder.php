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
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'program-list',
            'program-create',
            'program-edit',
            'program-delete',
            'permission-assign',
            'permission-revoke',
            'program-assign',
            'program-revoke',
            'program-show',
            'role-assign',
            'role-revoke',
            'role-show',
            'user-show',
            'admin-show',
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
