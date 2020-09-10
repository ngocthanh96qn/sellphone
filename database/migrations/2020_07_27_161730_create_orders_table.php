<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('guest_id')->nullable();
            $table->string('name');
            $table->string('address'); 
            $table->string('email');   
            $table->string('phone');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('deliverer_id');
            $table->string('total_price');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('guest_id')->references('id')->on('guests');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('deliverer_id')->references('id')->on('deliverers');
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
        Schema::dropIfExists('orders');
    }
}
