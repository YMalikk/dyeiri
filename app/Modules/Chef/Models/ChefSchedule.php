<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 29/03/2018
 * Time: 11:56 PM
 */

namespace App\Modules\Chef\Models;


use Illuminate\Database\Eloquent\Model;

class ChefSchedule extends Model
{
    protected $table = 'schedule_information';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'start_at',
        'ends_at',
        'day',
        'status',
        'user_id'
    ];

    function restaurant()
    {
        return $this->hasOne('App\Modules\Chef\Models\Chef','user_id','user_id');
    }
}