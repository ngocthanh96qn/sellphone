<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Role;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $name_role = null)
    {
       // dd('check middleware');
        $role_user = User::find(auth()->id())->roles()->get()->pluck('id')->toArray();

        $check_role = Role::where('name',$name_role)->value('id');
         if(in_array($check_role, $role_user)){
            return $next($request);
        }
        return redirect()->back()->with(['error' =>'You dont have permission !']);
        //dd($check_role);
       
    }
}
