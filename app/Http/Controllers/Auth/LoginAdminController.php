<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Auth;
use App\User;
class LoginAdminController extends Controller
{
    public function getLoginAdmin(){
         if(Auth::user()!=null){
            return redirect()->route('homeadmin');
        }
        return view('admin.login.loginadmin');
    }
  
    public function postLoginAdmin(LoginRequest $request)
    {
        $data = $request->only('email','password');
    
    // -- kiem tra email va password --//
	    if(\Auth::attempt($data)){
	    	$request->session()->regenerate();
	        $user = Auth::user()->role_users->pluck('role_id')->toArray();
	        
	        if($user){
	        	return redirect()->route('homeadmin');
	        }
	        else{
	        	//bao loi k ton tai trong quyen admin
	        	return redirect()->route('auth.loginadmin');
	        }
	       
	    }
	        return redirect()->back()->with(['error'=>'Email, pppassword not match!']);
	}
	public function logout(){
        Auth::logout();
        return redirect()->route('auth.loginadmin');
    }
}
