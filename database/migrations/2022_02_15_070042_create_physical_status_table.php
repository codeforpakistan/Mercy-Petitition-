<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2022_02_15_070042_create_physical_status_table.php
        Schema::create('physical_status', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('PhysicalStatus');
=======
        Schema::create('province', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('province_name');
>>>>>>> d162480ebf70941b7bf0ab90a10f796788cea65c:database/migrations/2022_02_15_105439_create_province_table.php
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
        Schema::dropIfExists('province');
    }
}
