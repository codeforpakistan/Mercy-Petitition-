<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPetitoin extends Model
{
    protected $fillable = [
        'petition_id', 'user_id','created', 'Department', 
    ];
}
