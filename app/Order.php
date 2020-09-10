<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable =
    ['user_id','guest_id','name','email','phone','address','status_id', 'deliverer_id', 'total_price', 'note' ];

    public function order_details()
    {
       return $this->hasMany('App\Order_detail');
   }    
   public function user()
   {
    return $this->belongsTo('App\User');
}
public function status()
{
    return $this->belongsTo('App\Status');
}
public function deliverer()
{
    return $this->belongsTo('App\Deliverer');
}
public function guest()
{
    return $this->belongsTo('App\Guest');
}

}
