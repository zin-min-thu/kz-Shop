<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('password')->nullable();
            $table->string('mobile_number')->nullable();       
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
        Schema::dropIfExists('tbl_customer');
    }
}
