<?php

namespace App;
use App\User;
use App\Section;
use App\File;
use App\PhysicalStatus;
use App\Homedepartment;
use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected  $table='petitions';
    protected $fillable = [
        'name','f_name', 'nationality', 'physicalstatus', 'confined_in_jail','prisonerid','file_in_department',
        'gender','dob','firdate','mercypetitiondate','section_id','status','date_of_sentence',
        'application_image','health_paper','prisoner_image','warrent_date', 'user_id',
        'remarks','sentence_in_court','warrent_file','warrent_information','received_from_department'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function fileattachements()
    {
        return $this->hasMany(File::class);
    }

    public function sectionss()
    {
        return $this->belongsTo(Section::class,"section_id");
     
    }
    public function physicalstatus()
    {
        return $this->belongsTo(PhysicalStatus::class,"physicalstatus_id");
     
    }
public function homedepartmentss()
    {
        return $this->hasMany(Homedepartment::class,'petition_id');
    }
    public function logpetitions()
    {
        return $this->hasMany(LogPetition::class,'petition_id');
    }
}