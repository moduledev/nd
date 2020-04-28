<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['code' => 'cake', 'name_ru' => 'торты', 'name_ua' => 'торти']);
        Category::create(['code' => 'pie', 'name_ru' => 'пироги', 'name_ua' => 'пироги']);
        Category::create(['code' => 'desserts', 'name_ru' => 'десерты', 'name_ua' => 'десерти']);
    }
}
