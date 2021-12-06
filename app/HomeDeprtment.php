<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeDeprtment extends Model
{
    protected $fillable = [
        'remarks', 'file_id', 'user_id', 'petition_id',
    ];
}
