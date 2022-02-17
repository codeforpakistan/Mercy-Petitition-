<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Petition;
class PhysicalStatus extends Model
{
  
    protected $table = 'physical_status';
    protected $fillable = ['id' , 'PhysicalStatus'];

    public function petitionphysicalstatus()
    {
        return $this->hasMany(Petition::class,"physicalstatus_id");
    }
}
