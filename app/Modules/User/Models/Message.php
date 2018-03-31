<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 31/03/2018
 * Time: 5:22 AM
 */

namespace App\Modules\User\Models;


use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

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
        'content',
        'subject',
        'status',
        'admin_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Modules\User\Models\User', 'id','user_id');
    }

    public function admin()

    {
        return $this->belongsTo('App\Modules\User\Models\User', 'id','admin_id');
    }
}