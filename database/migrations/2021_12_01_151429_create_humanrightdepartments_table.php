<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanrightdepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('humanrightdepartments', function (Blueprint $table) {
           $table->Increments('id');
            
              $table->unsignedInteger('file_id');
            $table->foreign('file_id')
            ->references('id')
            ->on('files')
            ->onDelete('cascade');
            $table->unsignedInteger('petition_id');
            $table->foreign('petition_id')
            ->references('id')
            ->on('petitions')
            ->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->unsignedInteger('homedepartment_id');
            $table->foreign('homedepartment_id')
            ->references('id')
            ->on('homedepartments')
            ->onDelete('cascade');
            $table->unsignedInteger('interiorministry_id');
            $table->foreign('interiorministry_id')
            ->references('id')
            ->on('interiorministries')
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
        Schema::dropIfExists('humanrightdepartments');
    }
}
