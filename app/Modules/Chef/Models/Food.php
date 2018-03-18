<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 04/03/2018
 * Time: 1:04 PM
 */

namespace App\Modules\Chef\Models;


use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $table = 'foods';

    protected $fillable = [
        'image',
        'description',
        'status',
        'chef_id',
    ];

    public function chef()
    {
        return $this->hasOne("App\Modules\Chef\Models\Chef",'id','chef_id');
    }
}