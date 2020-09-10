<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->bigInteger('price');
            $table->string('quantity');
            $table->string('size');
            $table->string('weight');
            $table->string('color');
            $table->string('image');
            $table->string('display');
            $table->string('os');
            $table->string('storage');
            $table->string('ram');
            $table->string('cpu');
            $table->string('gpu');
            $table->string('primary_camera');
            $table->string('rear_camera');
            $table->string('battery');
            $table->string('warranty');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
            $table->softDeletes();
          
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
