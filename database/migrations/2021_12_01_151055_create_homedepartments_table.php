<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomedepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homedepartments', function (Blueprint $table) {
           $table->Increments('id');
           
            $table->unsignedInteger('file_id');
            $table->foreign('file_id')
            ->references('id')
            ->on('files')
            ->onDelete('cascade');

            $table->unsignedInteger('petition_id');
            $table->foreign('petition_id')
            ->references('id')
            ->on('petitio')
            ->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
             $table->string('remarks');
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
        Schema::dropIfExists('homedepartments');
    }
}
