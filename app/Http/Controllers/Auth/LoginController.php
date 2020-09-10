<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\User\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request, $role)
    { 
       $data = $request->only('email', 'password');

       if(\Auth::attempt($data)){
        $request->session()->regenerate();
        if ($role == 'home') {

 return redirect()->route('user.Account');

 
        }
        elseif ($role== 'cart') {
            return redirect()->route('user.Checkout');
        }
    }
       else {
        return redirect()->back()->withErrors(['msg'=>'Mật khẩu hoặc email k đúng']);
       }

    }

}
