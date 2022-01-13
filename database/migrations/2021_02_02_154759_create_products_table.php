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
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('name_ru');
            $table->string('description');
            $table->string('description_ru');
            $table->string('code');
            $table->integer('pack_qty');
            $table->integer('pack_qty2');
            $table->integer('active');
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('currency_id');
            $table->string('image');
            $table->float('price',10,2);
            $table->string('properties');
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
