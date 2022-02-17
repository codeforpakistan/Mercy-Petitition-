<?php

namespace App;
use App\Jail;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{


    protected $table = 'province';
    protected $fillable = ['id' , 'province_name'];

    public function jail()
    {
        return $this->hasMany(Jail::class,"province_id");

    }
}
