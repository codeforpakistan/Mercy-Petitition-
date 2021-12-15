<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeAndPetitionIdAndHomedepartmentIdInteriorministryIdHumanrightdepartmentIdToFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->string('type')->nullable();
            $table->unsignedInteger('petition_id')->nullable();
            $table->foreign('petition_id')
            ->references('id')
            ->on('petitions')
            ->onDelete('cascade');
            $table->unsignedInteger('homedepartment_id')->nullable();
            $table->foreign('homedepartment_id')
            ->references('id')
            ->on('homedepartments')
            ->onDelete('cascade');
            $table->unsignedInteger('interiorministry_id')->nullable();
            $table->foreign('interiorministry_id')
            ->references('id')
            ->on('interiorministries')
            ->onDelete('cascade');
            $table->unsignedInteger('humanrightdepartment_id')->nullable();
            $table->foreign('humanrightdepartment_id')
            ->references('id')
            ->on('humanrightdepartments')
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
        Schema::table('files', function (Blueprint $table) {
            //
        });
    }
}
