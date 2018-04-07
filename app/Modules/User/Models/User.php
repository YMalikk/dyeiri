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
        'gender',
        'lat',
        'lng',
        'current_user',
        'image',
        'mobile',
        'address',
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
    
    public function reviews()
    {
        return $this->hasMany('App\Modules\Chef\Models\Review', 'client_id','id');
    }
    
      public function food_order_reviews()
    {
        return $this->hasMany('App\Modules\Food\Models\FoodOrderReview', 'user_id','id');
    }

    public function messages()
    {
        return $this->hasMany('App\Modules\User\Models\Message', 'user_id','id');
    }


    public function messagesSent()
    {
        return $this->hasMany('App\Modules\User\Models\Message', 'sender_id','id');
    }

    public function messagesReceived()
    {
        return $this->hasMany('App\Modules\User\Models\Message', 'to_id','id');

    }

    public function messagesSentNotRead()
    {
        return $this->hasMany('App\Modules\User\Models\Message', 'sender_id','id')->where('status','=',0);
    }

    public function messagesNotRead()
    {
        return $this->hasMany('App\Modules\User\Models\Message', 'to_id','id')->where('status','=',0);
    }

    public function messagesSentDeleted()
    {
        return $this->hasMany('App\Modules\User\Models\Message', 'sender_id','id')->where('status','=',2);
    }

    public function messagesReceiveDeleted()
    {
        return $this->hasMany('App\Modules\User\Models\Message', 'to_id','id')->where('status','=',2);
    }

}
