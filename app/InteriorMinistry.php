<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;
use App\Petition;
use App\HomeDepartment;

class InteriorMinistry extends Model
{
    protected $fillable = [
        'remarks',  'user_id', 'homedartment_id',
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
