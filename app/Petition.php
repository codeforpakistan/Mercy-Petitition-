<?php

namespace App;
use App\User;
use App\Section;
use App\File;
use App\Province;
use App\PhysicalStatus;
use App\Homedepartment;
use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected  $table='petitions';
    protected $fillable = [
        'name','f_name', 'nationality', 'confined_in_jail','prisonerid','file_in_department','physicalstatus_id',
        'gender','dob','mercypetitiondate','section_id','status','date_of_sentence',
        'application_image','health_paper','prisoner_image', 'user_id','province_id',
        'remarks','sentence_in_court','warrent_file','received_from_department',
         'case_fir_no','fir_date','name_of_policestation','case_title','cnic','martial_status','caste','religion','education',
         'mental_health','physical_health','prisoner_conduct','compoundable_offence','non_compoundable_offence','Occupation',
         'nature_of_crime','mitigating_circumstances','petition_history','age_of_petitioner',
        'convection_summary','check_list_file', 'petition_roll_file', 'petition_certificate','judgments_file','application_in_urdu_file'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public function fileattachements()
    {
        return $this->hasMany(File::class);
    }
    public function provinces()
    {
        return $this->belongsTo(Province::class,"province_id");
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
