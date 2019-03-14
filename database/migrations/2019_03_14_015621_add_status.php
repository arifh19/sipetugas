<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supirs', function (Blueprint $table) {
            $table->unsignedInteger('status')->after('nama_supir')->nullable();
        });

        Schema::table('buses', function (Blueprint $table) {
            $table->unsignedInteger('status')->after('kapasitas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supirs', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('buses', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        
    }
}
