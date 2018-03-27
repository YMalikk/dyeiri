<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 26/03/2018
 * Time: 10:10 PM
 */

namespace App\Modules\Chef\Models;


use Illuminate\Database\Eloquent\Model;

class KitchenImage extends Model
{
    //
    protected $table = 'kitchen_images';

    protected $fillable = [
       'image',
        'status',
       'chef_id'
    ];

}