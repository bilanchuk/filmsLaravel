<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $guarded = [];



    public function scopeCategory($query,$current){
        return $query->where('category',$current);
    } 
}
