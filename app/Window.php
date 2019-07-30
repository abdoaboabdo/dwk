<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Window extends Model
{
    public function images(){
        return $this->hasMany(Image::class,'window_id');
    }
}
