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
             $table->bigInteger('prisonerid');
             
            $table->string('name');
            $table->string('f_name');
            $table->string('nationality');
            $table->string('case_fir_no');
             $table->string('name_of_policestation');
             $table->string('mark_of_identification');
             $table->string('imediate_heirs');
             $table->string('address');
             $table->string('phone');
             
            $table->string('case_title');
            
            $table->string('cnic');
            
            $table->string('martial_status');
            
            $table->string('caste');
            
            $table->string('religion');
            
            $table->string('education');
            $table->string('date_of_sentence');
            
            $table->string('mental_health');
            
            $table->string('physical_health');
            
            $table->string('prisoner_conduct');
            $table->string('non_compoundable_offence');
            $table->string('compoundable_offence');
            $table->string('petition_history');
            $table->string('mitigating_circumstances');
            $table->string('Occupation');
            $table->string('convection_summary');
            $table->string('check_list_file');
            $table->string('petition_roll_file');
            $table->string('petition_certificate');
            $table->string('age_of_petitioner');
            $table->string('judgments_file');
            $table->string('application_in_urdu_file');
            
            $table->string('nature_of_crime');
           
            $table->string('confirmed_in_jail');
            $table->string('status');
            $table->string('file_in_department');
            $table->string('gender');
            $table->string('dob');
            $table->string('fir_date');
            $table->string('section_id');
            $table->string('mercypetitiondate');
            $table->string('received_from_department')->nullable();
           
            $table->string('application_image');
            $table->string('health_paper');
            $table->string('prisoner_image');
           
            $table->string('remarks')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->string('sentence_in_court');
            $table->string('warrent_file');
           
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
