<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 23/03/2018
 * Time: 12:15 AM
 */

namespace App\Modules\Chef\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    //
    protected $table = 'categories';

    protected $fillable = [
       'name'
    ];


}