<?php

namespace App\Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $table = 'posts';

    public $timestamps = true;
    protected $fillable = [
        'image',
        'title',
        'description',
        'status',
        'category_id',
        'admin_id'
    ];

    public function category()
    {
        return $this->hasOne("App\Modules\Chef\Models\Category",'id','category_id');
    }

}
