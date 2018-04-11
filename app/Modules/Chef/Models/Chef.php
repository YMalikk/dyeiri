<?php

namespace App\Modules\Chef\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model {

    //
    protected $table = 'chef';

    protected $fillable = [
        'mobile',
        'cover_photo',
        'address',
        'likes_count',
        'speciality',
        'description',
        'work',
        'language',
        'status',
        'user_id',
    ];

    public function getFoods()
    {
        return $this->hasMany('App\Modules\Food\Models\Food','chef_id','id');
    }

    public function gallery()
    {
        return $this->hasMany('App\Modules\Chef\Models\Gallery','chef_id','id');
    }

    function user()
    {
        return $this->hasOne('App\Modules\User\Models\User','id','user_id');
    }
    
    public function reviews()
    {
        return $this->hasMany('App\Modules\Chef\Models\Review','chef_id','id');
    }

    public function KitchenImages()
    {
        return $this->hasMany('App\Modules\Chef\Models\KitchenImage','chef_id','id');
    }
    public function availableKitchenImages()
    {
        return $this->hasMany('App\Modules\Chef\Models\KitchenImage','chef_id','id')->where('status','=',1);
    }

    function schedule()
    {
        return $this->hasMany('App\Modules\Chef\Models\ChefSchedule','user_id','user_id');
    }

    public function availableGallery()
    {
        return $this->hasMany('App\Modules\Chef\Models\Gallery','chef_id','id')->where('status','=',1);
    }



}
