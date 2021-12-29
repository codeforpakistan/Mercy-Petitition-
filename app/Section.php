<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  App\Petition;
class Section extends Model
{
    protected $table='sections';
    protected $fillable = [
        'undersection',
    ];

    public function sectionpetitions()
    {
        return $this->hasMany(Petition::class,"section_id");
    }
}
