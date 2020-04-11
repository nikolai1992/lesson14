<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    //
    protected $guarded=[];
    public function cars()
    {
        return $this->hasMany('App\Car', 'type_id', 'id');
    }
}
