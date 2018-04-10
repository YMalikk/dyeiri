<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 07/04/2018
 * Time: 4:05 PM
 */

namespace App\Modules\User\Models;


use Illuminate\Database\Eloquent\Model;

class WhichList extends Model
{
    protected $table = 'which_list';

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
        'image',
        'status',
    ];


}