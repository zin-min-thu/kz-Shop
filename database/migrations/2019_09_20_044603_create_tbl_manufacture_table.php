<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblManufactureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_manufacture', function (Blueprint $table) {
            $table->increments('manufacture_id');
            $table->string('manufacture_name')->nullable();
            $table->string('manufacture_description')->nullable();
            $table->integer('publication_status')->nullable();
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
        Schema::dropIfExists('tbl_manufacture');
    }
}
