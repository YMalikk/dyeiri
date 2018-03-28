<?php


namespace App\Modules\Food\Models;


use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $table = 'foods';

    protected $fillable = [
        'image',
        'description',
        'status',
        'category_id',
        'chef_id',
    ];

    public function chef()
    {
        return $this->hasOne("App\Modules\Chef\Models\Chef",'id','chef_id');
    }

    public function category()
    {
        return $this->hasOne("App\Modules\Chef\Models\Category",'id','category_id');
    }

    public function food_order_reviews()
    {
        return $this->hasMany('App\Modules\Food\Models\FoodOrderReview', 'food_id','id');
    }

}