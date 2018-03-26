<?php

namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\User\Models\User;
use App\Modules\Chef\Models\Chef;

class FoodOrder extends Model {

    //
    protected $table = 'food_orders';
    public $timestamps = true;

    protected $fillable = [
        'order_id',
        'food_id',
        'quantity'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
