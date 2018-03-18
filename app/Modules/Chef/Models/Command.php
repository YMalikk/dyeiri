<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 04/03/2018
 * Time: 1:05 PM
 */

namespace App\Modules\Chef\Models;


use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $table = 'commands';

    protected $fillable = [
        'status',
        'prepared_time',
        'pickup_time',
        'type',
        'status',
        'food_id',
        'client_id',
        'delivery_man_id',
    ];

    public function food()
    {
        return $this->hasOne('App\Modules\Chef\Models\Food','id','food_id');
    }

    public function deliveryMan()
    {
        return $this->hasOne('App\Modules\Chef\Models\Food','id','delivery_man_id');
    }

    function client()
    {
        return $this->hasOne('App\Modules\User\Models\User','id','client_id');
    }
}