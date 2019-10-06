<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AluminumType extends Model
{
    protected $guarded=[];
    public function doors(){
        return $this->hasMany(Door::class,'aluminum_type_id');
    }
    public function windows(){
        return $this->hasMany(Window::class,'aluminum_type_id');
    }
}
