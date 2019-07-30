<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
    public function images(){
        return $this->hasMany(Image::class,'kitchen_id');
    }
}
