<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 04/03/2018
 * Time: 1:17 PM
 */

namespace App\Modules\User\Models;


use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule_information';

    protected $fillable = [
        'start_at',
        'ends_at',
        'day',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne('App\Modules\User\Models\User','id','user_id');
    }


}