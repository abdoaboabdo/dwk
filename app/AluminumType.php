<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AluminumType extends Model
{
    public function doors(){
        return $this->hasMany(Door::class,'aluminum_type_id');
    }
}
