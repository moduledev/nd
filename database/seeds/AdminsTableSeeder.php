<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(['name' => 'Сергей Байдуж','email' => 'admin@admin.com','password' => Hash::make('12345678')]);
        Admin::create(['name' => 'Екатерина Байдуж','email' => 'kat@admin.com','password' => Hash::make('12345678')]);
    }
}
