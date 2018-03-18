<?php

namespace App\Modules\Chef\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model {

    //
    protected $table = 'chef';

    protected $fillable = [
        'likes_count',
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

}
