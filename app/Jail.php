<?php

namespace App;
use App\Province;
use Illuminate\Database\Eloquent\Model;

class Jail extends Model
{

    protected $table = 'jails';
    protected $fillable = ['id' , 'jail_name' , 'province_id'];
    public function provinces()
    {
        return $this->belongsTo(Province::class,"province_id");
    }
}
