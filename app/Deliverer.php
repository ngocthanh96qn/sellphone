<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliverer extends Model
{
    protected $fillable = [
        'name', 'phone'
    ];
    public function orders (){
        return $this->hasMany('App\Order');
    }
}
