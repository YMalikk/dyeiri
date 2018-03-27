<?php

namespace App\Modules\Chef\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model {

    //
    protected $table = 'chef';

    protected $fillable = [
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
        return $this->hasMany('App\Modules\Chef\Models\Food','chef_id','id');
    }

    function user()
    {
        return $this->hasOne('App\Modules\User\Models\User','id','user_id');
    }
    
    public function reviews()
    {
        return $this->hasMany('App\Modules\Chef\Models\Review','chef_id','id');
    }

    public function getKitchenImages()
    {
        return $this->hasMany('App\Modules\Chef\Models\KitchenImage','chef_id','id');
    }


}
