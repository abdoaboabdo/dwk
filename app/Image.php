<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=['image'];
    public function door(){
        return $this->belongsTo(Door::class,'door_id');
    }
    public function window(){
        return $this->belongsTo(Door::class,'window_id');
    }
    public function kitchen(){
        return $this->belongsTo(Door::class,'kitchen_id');
    }
}
