<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected  $table='petitions';
    protected $fillable = [
        'name','f_name', 'nationality', 'physicalstatus', 'confined_in_jail',
        'gender','dob','fir&date','mercypetitiondate','section_id','status','date_of_sentence',
        'application_image','health_paper','prisoner_image','warrent_date',
        'remarks','sentence_in_court','warrent_file','warrent_information',
    ];
}
