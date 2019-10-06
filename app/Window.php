<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Window extends Model
{
    protected $guarded=[];
    public function images(){
        return $this->hasMany(Image::class,'window_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function aluminum_type(){
        return $this->belongsTo(AluminumType::class,'aluminum_type_id');
    }
}
