<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 23/03/2018
 * Time: 12:15 AM
 */

namespace App\Modules\Food\Models;


use App\Modules\Food\Models\FoodOrderReview;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class FoodOrderReviewRating extends Model
{

    //
    protected $table = 'food_order_review_ratings';
    public $timestamps = true;

    protected $fillable = [
        'rating',
        'food_order_review_id',
        'rating_type_id'
    ];

    public function review()
    {
        return $this->belongsTo(FoodOrderReview::class);
    }
}
