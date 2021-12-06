<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'file', 'petition_id', 'homedepartment_id', 'petition_id','interiorministry_id','humanrightdepartment_id','department',
    ];
}
