<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=[];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function doors(){
        return $this->hasMany(Door::class,'category_id');
    }
    public function windows(){
        return $this->hasMany(Window::class,'category_id');
    }
    public function Kitchens(){
        return $this->hasMany(Kitchen::class,'category_id');
    }
}
