<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = Permission::all()->pluck('name');
        $role = Role::updateOrCreate(['name' => 'super-admin']);

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
        $user = Admin::updateOrCreate(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('password')]);
        Admin::updateOrCreate(['name' => 'Екатерина Байдуж','email' => 'kat@admin.com','password' => Hash::make('12345678')]);


        if (!$user->hasRole('super-admin')) {
            $user->assignRole('super-admin');
        }

        if (!$user) {
//            $user = Admin::updateOrCreate(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('password')]);
            $user->assignRole('super-admin');
        }
    }
}
