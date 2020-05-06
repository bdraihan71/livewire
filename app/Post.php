<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function subCategory()
    {
        return $this->belongsTo('App\Subcategory','subcategory_id');
    }
}
