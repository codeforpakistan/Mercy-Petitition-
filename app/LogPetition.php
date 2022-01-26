<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPetition extends Model
{
    protected $table="logpetitions";
    protected $fillable = [
        'petition_id', 'user_id','created', 'department', 
    ];

    public function petitions()
    {
        return $this->belongsTo(Petition::class,"petition_id");
     
    }
    public function users()
    {
        return $this->belongsTo(User::class,"user_id");
     
    }
}
