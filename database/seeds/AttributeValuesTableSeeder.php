<?php

use App\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weights = [1000, 1200, 1600, 2200];


        foreach ($weights as $weight)
        {
            AttributeValue::create([
                'attribute_id'      =>  1,
                'value'             =>  $weight,
                'price'             =>  null,
            ]);
        }
    }
}
