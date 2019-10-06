<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
    protected $guarded=[];
    public function images(){
        return $this->hasMany(Image::class,'kitchen_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
