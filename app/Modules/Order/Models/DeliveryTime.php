<?php

namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\User\Models\User;
use App\Modules\Chef\Models\Chef;

class DeliveryTime extends Model {

    //
    protected $table = 'delivery_times';
    public $timestamps = true;

    protected $fillable = [
        'time'
    ];
}
