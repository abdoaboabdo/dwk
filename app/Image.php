<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded=[];
    protected $fillable=['image','door_id','kitchen_id','window_id'];
    protected $appends=['image_path'];

    public function getImagePathAttribute(){
        $folder='';
        if ($this->door_id != null){
            $folder='door';
        }elseif ($this->kitchen_id != null){
            $folder='kitchen';
        }elseif ($this->window_id != null){
            $folder='window';
        }
        return asset('uploads/'.$folder.'_images/'.$this->image);
    }
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
