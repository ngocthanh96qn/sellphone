<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password_reset extends Model
{
     protected $fillable = [
        'user_id', 'token', 'updated_at' 
    ];
}
