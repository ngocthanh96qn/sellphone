<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     protected $fillable = [
        'guest_id', 'product_id',  'user_id' , 'value', 'content'
    ];
}
