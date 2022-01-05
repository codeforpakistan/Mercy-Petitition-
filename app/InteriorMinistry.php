<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;
use App\Petition;
use App\HomeDepartment;

class InteriorMinistry extends Model
{
    protected $table="interiorministries";
    protected $fillable = [
        'remarks', 'petition_id', 'user_id', 'homedepartment_id',
    ];

    public function interiorfileattachements()
    {
        return $this->hasMany(File::class);
    }

    public function interiorpetitions()
    {
        return $this->belongsTo(Petition::class);
    }
    public function homepetitions()
    {
        return $this->belongsTo(HomeDepartment::class);
    }
}
