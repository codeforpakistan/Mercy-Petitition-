<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogHomeDeprtment extends Model
{
    protected $fillable = [
        'petition_id', 'user_id','created', 'Department', 
    ];
}
