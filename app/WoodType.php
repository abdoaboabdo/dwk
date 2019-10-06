<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WoodType extends Model
{
    protected $guarded=[];
    public function doors(){
        return $this->hasMany(Door::class,'wood_type_id');
    }
}
