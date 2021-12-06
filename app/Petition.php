<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected  $table='petitions';
    protected $fillable = [
        'name', 'nationality', 'physicalstatus', 'confirmed_in_jail',
        'gender','dob','fir&date','mercypetitiondate','usection_id',
        'application_image','health_paper','prisoner_image','department',
        'remarks','otherdocument','sentence_in_court','warrent_file','warrent_information',
    ];
}
