<?php


namespace App\Modules\Food\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Order\Models\Order;
use App\Modules\User\Models\User;



class FoodOrderReview extends Model
{
    //
    protected $table = 'food_order_reviews';

    protected $fillable = [
        'content',
        'status',
        'user_id',
        'food_id',
        'order_id',
    ];

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}