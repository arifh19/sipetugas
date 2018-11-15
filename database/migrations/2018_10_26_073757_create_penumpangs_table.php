<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenumpangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penumpangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naik_pelajar');
            $table->string('naik_umum');
            $table->string('turun_pelajar');
            $table->string('turun_umum');
            $table->string('lokasi');
            $table->unsignedInteger('jumlah');
            $table->unsignedInteger('bus_id');
            $table->unsignedInteger('supir_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('bus_id')->references('id')->on('buses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('supir_id')->references('id')->on('supirs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penumpangs');
    }
}
