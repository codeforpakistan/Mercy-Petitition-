<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;
use App\Petition;
use App\HomeDepartment;
class HumanRightDepartment extends Model
{
    protected $table="humanrightdepartments";
    protected $fillable = [
        'remarks', 'petition_id', 'user_id', 'homedepartment_id','interiorministry_id',
    ];

    public function humanrightfileattachements()
    {
        return $this->hasMany(File::class,'humanrightdepartment_id');
    }
}
