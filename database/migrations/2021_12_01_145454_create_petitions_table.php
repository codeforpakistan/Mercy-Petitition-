<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petitions', function (Blueprint $table) {
             $table->Increments('id');
            $table->string('name');
            $table->string('nationality');
            $table->string('physicalstatus');
            $table->string('confirmed_in_jail');
            $table->string('gender');
            $table->string('dob');
            $table->string('fir&date');
            $table->string('mercypetitiondate');
            $table->unsignedInteger('section_id');
            $table->foreign('section_id')
  ->references('id')->on('sections')
  ->onDelete('cascade');
            $table->string('application_image');
            $table->string('health_paper');
            $table->string('prisoner_image');
            $table->string('department');
            $table->string('remarks');
            $table->string('otherdocument');
            $table->string('sentence_in_court');
            $table->string('warrent_file');
            $table->string('warrent_information');
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
        Schema::dropIfExists('petitions');
    }
}
