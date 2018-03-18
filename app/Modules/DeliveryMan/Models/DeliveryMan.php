<?php

namespace App\Modules\DeliveryMan\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model {

    protected $table = 'delivery_man';

    protected $fillable = [
        'description',
        'status',
        'transport',
        'user_id',
    ];

    function user()
    {
        return $this->hasOne('App\Modules\User\Models\User','id','user_id');
    }
}
