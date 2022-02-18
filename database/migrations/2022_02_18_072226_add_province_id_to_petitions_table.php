<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProvinceIdToPetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('petitions', function (Blueprint $table) {
            $table->unsignedInteger('province_id')->nullable();
            $table->foreign('province_id')
            ->references('id')
            ->on('province')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('petitions', function (Blueprint $table) {
            //
        });
    }
}
