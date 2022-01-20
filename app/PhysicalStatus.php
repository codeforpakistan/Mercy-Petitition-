<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalStatus extends Model
{
    public $timestamps = false;
    protected $primaryKey='PSid';
    protected $table = 'physical_status';
    protected $fillable = ['PSid' , 'PhysicalStatus'];
}
