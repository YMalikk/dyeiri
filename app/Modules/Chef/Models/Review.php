<?php


namespace App\Modules\Chef\Models;


use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    //
    protected $table = 'reviews';
    public $timestamps = true;

    protected $fillable = [
        'content',
        'status',
        'chef_id',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function chef()
    {
        return $this->belongsTo(Chef::class);
    }

    public function reviewRating()
    {
        return $this->hasMany(ReviewRating::class);
    }

}
