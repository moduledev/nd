<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('base_name');
            $table->string('slug')->index();
            $table->string('name_ua')->index();
            $table->string('name_ru')->index();
            $table->text('description_ru');
            $table->text('description_ua');
            $table->string('composition_ua');
            $table->string('composition_ru');
            $table->tinyInteger('available')->default(1);
            $table->tinyInteger('gluten')->default(0)->index();
            $table->tinyInteger('lactose')->default(0)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
