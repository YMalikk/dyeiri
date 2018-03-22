<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    public $timestamps = true;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'lat',
        'lng',
        'image',
        'mobile',
        'status',
        'provider',
        'provider_id',
        'confirmation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Modules\User\Models\Role', 'users_roles')->withTimestamps();
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('title', $role)->first()) {
            return true;
        }
        return false;
    }


    public function assignRole($role)
    {
        $this->roles()->attach($role);
    }

    public function chef()
    {
        return $this->hasOne('App\Modules\Chef\Models\Chef', 'user_id','id');
    }

}
