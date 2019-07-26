<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function woodtype(){
        return $this->belongsTo(Woodtype::class);
    }
    public function aluminum(){
        return $this->belongsTo(AluminumType::class);
    }
    public function door(){
        return $this->belongsTo(DoorType::class);
    }
}
