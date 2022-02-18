<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jail extends Model
{
  
    protected $table = 'jails';
    protected $fillable = ['id' , 'jail_name','province_id'];

   
}
