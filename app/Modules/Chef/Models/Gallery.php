<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 04/04/2018
 * Time: 6:48 PM
 */

namespace App\Modules\Chef\Models;


use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery_foods';

    protected $fillable = [
        'image',
        'status',
        'category_id',
        'chef_id'
    ];

    public function chef()
    {
        return $this->belongsTo(Chef::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}