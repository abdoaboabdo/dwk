<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    public function images(){
        return $this->hasMany(Image::class,'door_id');
    }
    public function aluminum_type(){
        return $this->belongsTo(AluminumType::class,'aluminum_type_id');
    }
    public function wood_type(){
        return $this->belongsTo(AluminumType::class,'wood_type_id');
    }
}
