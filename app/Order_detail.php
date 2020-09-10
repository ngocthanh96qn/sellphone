<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable = [
        'order_id', 'product_id',  'sale_quantity' , 'price'
    ];
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function product (){
         return $this->belongsTo('App\Product');
    }
}
