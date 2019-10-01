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
            $table->increments('id');
            $table->longText('cart_data');
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->longText('address');
            $table->string('country');
            $table->string('state');
            $table->string('zip');
            $table->decimal('total', 10, 2);
            $table->integer('completed')->default('0');

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
