<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\User\Controller;

class SessionController extends Controller
{
  public function index()
  {

  	$name = array('ngọc',"thanh","thauhi");
  	session()->put('name',$name);
  	print_r(session()->get('name'));

  }
}
