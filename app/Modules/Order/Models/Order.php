<?php

namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\User\Models\User;
use App\Modules\Chef\Models\Chef;

class Order extends Model {

    //
    protected $table = 'orders';
    public $timestamps = true;

    protected $fillable = [
        'chef_id',
        'client_id',
        'status',
        'price'
    ];

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function chef()
    {
        return $this->belongsTo(Chef::class);
    }

    public function foods()
    {
        return $this->hasMany(FoodOrder::class);
    }

}
