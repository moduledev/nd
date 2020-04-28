<?php

use App\Attribute;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create([
            'code'          =>  'weight',
            'name_ua'          =>  'Вага',
            'name_ru'          =>  'Вес',
            'is_filterable' =>  1,
            'is_required'   =>  1,
        ]);

    }
}
