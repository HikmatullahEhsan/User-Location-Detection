<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Cmgmyr\Messenger\Traits\Messagable;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','dep_id','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    // public function getIsAdminAttribute()
    // {
    //     return true;
    // }


}
