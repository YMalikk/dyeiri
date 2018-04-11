<?php

namespace App\Modules\DeliveryMan\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model {

    protected $table = 'delivery_man';

    protected $fillable = [
        'status',
        'transport',
        'driver_license',
        'smartphone',
        'student',
        'user_id',
    ];

    function user()
    {
        return $this->hasOne('App\Modules\User\Models\User','id','user_id');
    }
}
