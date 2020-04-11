<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $guarded=[];
//    protected $fillable = [
//        "name"
//    ];
    public function type()
    {
        return $this->belongsTo('App\CarType','type_id', 'id');
    }
}
