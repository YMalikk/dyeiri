<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model {

    protected $table = 'plateform';
    public $timestamps = true;

    protected $fillable = [
        'time_limit',
    ];
}
