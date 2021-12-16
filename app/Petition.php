<?php

namespace App;
use App\User;
use App\File;
use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected  $table='petitions';
    protected $fillable = [
        'name','f_name', 'nationality', 'physicalstatus', 'confined_in_jail',
        'gender','dob','firdate','mercypetitiondate','section_id','status','date_of_sentence',
        'application_image','health_paper','prisoner_image','warrent_date', 'user_id',
        'remarks','sentence_in_court','warrent_file','warrent_information',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function fileattachements()
    {
        return $this->hasMany(File::class);
    }
}
