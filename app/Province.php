<?php

namespace App;
use App\Jail;
use App\Petition;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{


    protected $table = 'province';
    protected $fillable = ['id' , 'province_name'];

    public function jail()
    {
        return $this->hasMany(Jail::class,"province_id");

    }
    public function provincepetitions()
    {
        return $this->hasMany(Petition::class,"province_id");
    }
    public function users()
    {
        return $this->hasMany(User::class,"province_id");

    }
}
