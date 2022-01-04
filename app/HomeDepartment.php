<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;
use App\Petition;
class HomeDepartment extends Model
{
    protected $table="homedepartments";
    protected $fillable = [
        'remarks',  'user_id', 'petition_id',
    ];


    public function homefileattachements()
    {
        return $this->hasMany(File::class,'homedepartment_id');
    }
    public function homepetitions()
    {
        return $this->belongsTo(Petition::class);
    }
    
}
