<?php
namespace App;
  
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
  use App\Petition;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status','Confined_in_jail',
    ];
  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
  
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function petitions()
    {
        return $this->hasMany(Petition::class,'petition_id');
    }
    public function logpetitions()
    {
        return $this->hasMany(LogPetition::class,'user_id');
    }
}
