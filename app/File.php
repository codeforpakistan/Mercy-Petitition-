<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table="files";
    protected $fillable = [
        'file', 'petition_id', 'homedepartment_id','interiorministry_id','humanrightdepartment_id','department',
    ];
    public function petitions()
    {
        return $this->belongsTo(Petition::class);
    }
}
