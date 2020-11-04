<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('order_id');
            $table->string('order_date');
            $table->string('ship_date');
            $table->integer('ship_mode_id')->unsigned();
            $table->integer('customer_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('sales');
            $table->integer('quantity');
            $table->integer('discount_id')->nullable();
            $table->float('profit');
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
