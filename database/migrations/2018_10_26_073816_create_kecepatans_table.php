<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKecepatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecepatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status');
            $table->unsignedInteger('bus_id');
            $table->unsignedInteger('supir_id');
            $table->timestamps();

            $table->foreign('bus_id')->references('id')->on('buses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('supir_id')->references('id')->on('supirs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecepatans');
    }
}
