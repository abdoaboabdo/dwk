<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoorType extends Model
{
    public function products(){
        return $this->hasMany(Product::class);
    }
}
