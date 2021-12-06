<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteriorMinistry extends Model
{
    protected $fillable = [
        'remarks', 'file_id', 'user_id', 'homedartment_id',
    ];
}
