<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HumanRightDepartment extends Model
{
    protected $fillable = [
        'remarks', 'file_id', 'user_id', 'homedartment_id','interiorministry_id',
    ];
}
