<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 23/03/2018
 * Time: 12:15 AM
 */

namespace App\Modules\Chef\Models;


use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{

    //
    protected $table = 'review_ratings';
    public $timestamps = true;

    protected $fillable = [
        'rating',
        'review_id',
        'rating_type_id'
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
