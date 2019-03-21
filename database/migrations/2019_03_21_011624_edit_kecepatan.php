<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditKecepatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('kecepatans');
        Schema::create('kecepatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kecepatan');
            $table->unsignedInteger('supir_id');
            $table->timestamps();
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
