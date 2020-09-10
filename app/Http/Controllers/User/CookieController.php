<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\User\Controller;

class CookieController extends Controller
{
    public function setCookie(Request $request) {
    	$minutes =1;
    	$response = new Response("hello");
    	$cars=12;
    	$response->withCookie(cookie('name',$cars));
    	return $response;
    }
      public function getCookie(Request $request) {
    	$value = $request->cookie('name');
    	return $value;
    }
}
