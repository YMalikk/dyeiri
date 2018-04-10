<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 07/04/2018
 * Time: 4:06 PM
 */

namespace App\Modules\User\Models;


use Illuminate\Database\Eloquent\Model;

class WhichListUser extends Model
{
    protected $table = 'which_list_users';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'which_id',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Modules\User\Models\User', 'users_roles')->withTimestamps();
    }

    public function which()
    {
        return $this->hasOne("App\Modules\User\Models\WhichList",'id','which_id');
    }
}