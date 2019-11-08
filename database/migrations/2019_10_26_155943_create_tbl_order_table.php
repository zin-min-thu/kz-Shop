<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('customer_id');
            $table->integer('shipping_id');
            $table->integer('payment_id');
            $table->string('order_total')->nullable();
            $table->string('order_status');
            $table->timestamp('order_date_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_order');
    }
}
