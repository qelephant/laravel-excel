<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excel_data', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('order_date');
            $table->string('ship_date');
            $table->string('ship_mode');
            $table->string('customer_id');
            $table->string('customer_name');
            $table->string('segment');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('region');
            $table->string('product_id');
            $table->string('category');
            $table->string('sub_category');
            $table->string('product_name');
            $table->string('sales');
            $table->string('quantity');
            $table->string('discount');
            $table->string('profit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excel_data');
    }
}
