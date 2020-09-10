<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use  SoftDeletes;
	protected $table = 'categories';
    protected $fillable = [
      'name'
    ];

    public function products(){ //khai bao quan he 1 nhieu với bảng Product

    	return $this->hasMany('App\Product');
    }
}
