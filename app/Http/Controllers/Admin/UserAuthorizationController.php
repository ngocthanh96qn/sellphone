<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Role;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;

class UserAuthorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $user_id = DB::table('role_user')->pluck('user_id')->toArray();
        $user_id = array_unique($user_id);
        //dd($user_id);
        foreach ($user_id as $key => $value) {
            $user[] = User::find($value);
        }
        // dd($user);
        return view('admin.user_auth.list', compact('user'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user_auth.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
         
        //---- insert to users table ---//
        $data = $request->except('_token');
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        // --- insert to  role_user table ---//
        //-- phan quyen cho user-- //
        $user->roles()->attach($request->roles);
        
        return redirect()->route('userAuth.index')->with(['message'=>'Đã tạo thành công !!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = User::find($id);
        $roles = Role::all();
        //checked id của role//
        $getRole_id = DB::table('role_user')->where('user_id',$id)->get()->pluck('role_id');
         return view('admin.user_auth.edit', compact('user','getRole_id','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
     
         //---- insert to users table ---//
        $user = User::find($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,' .$id,
            ],
            [
            'email.required' => 'Vui lòng nhập email! ',
            'email.email' => 'email không hợp lệ',
            'email.unique' => 'email đã tồn tại',
        ]);
        $data = $request->except('_token', '_method');
        $data['password'] = bcrypt($request->password);
        $user->update($data);
        // --- insert to  role_user table ---//
            //-- phan quyen cho user-- //
        $user->roles()->sync($request->roles);
        
        return redirect()->route('userAuth.index')->with(['message'=>'Đã sửa thành công!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $user->roles()->detach();
        return redirect()->route('userAuth.index');
    }
}
