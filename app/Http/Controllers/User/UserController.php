<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\User\Controller;
use Auth;
use App\Order;
use App\Order_detail;
use App\User;
use App\Product;
use App\Status;
use App\Password_reset;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ResetRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Mail;
use Session;
class UserController extends Controller
{
	
	public function show(){
		if (Auth::check()) {       	
			$user=Auth::user()->toArray();
			$account=User::find(Auth::user()->id)->orders->toArray();
			foreach ($account as $key => $value) {
				$account[$key]['status_name'] = Status::find($value['status_id'])->toArray()['status'];
				$account[$key]['details'] = Order::find($value['id'])->order_details->toArray();
				foreach ($account[$key]['details'] as $key1 => $order_detail) {
					$account[$key]['details'][$key1]['product_name'] = Product::find($account[$key]['details'][$key1]['product_id'])->toArray()['name'];
				}
			}
			krsort($account);
			// dd($account);
			return view('user.User',compact('account','user'));
		}
		else {
			$role = 'home';
			return view('user.login',compact('role'));
		}
	}
	public function edit() {
		return view('user.editProfile');
	}
	public function update(UserRequest $request) {
		$data = $request->except('_token');
		// $data['password'] = bcrypt( $data['password']);  
		Auth::user()->update($data);
		return view('user.editSuccess');
	}

	public function register(RegisterRequest $request, $role)
	{

		$data = $request->except('_token','_method');
		$data['password'] = bcrypt( $data['password']);     
		$user = User::create($data);
		$dataLogin=$request->only('email', 'password');
		\Auth::attempt($dataLogin);
		$request->session()->regenerate();
		if ($role == 'home') {
			return redirect()->route('user.Account');
		}
		elseif ($role== 'cart') {
			return redirect()->route('user.Checkout');
		}       
	}
	public function ResetPassword(ResetRequest $request){
		if(User::Where('email','=',$request->email)->first())
		{
			$user= User::Where('email','=',$request->email)->first();

			if (Password_reset::Where('user_id','=',$user->id)->first()) {
				$data = ['user_id'=>$user->id,'token'=>$request->_token,'created_at'=>now()];
				Password_reset::Where('user_id','=',$user->id)->first()->update($data);;

			}
			else{
				$data = ['user_id'=>$user->id,'token'=>$request->_token,'created_at'=>now()];
				Password_reset::insert($data);
			}
			

			$linkReset = url(\URL::temporarysignedRoute('user.ResetPassword',\Carbon\Carbon::now()->addMinutes(10),['token'=>$request->_token]));

			Mail::send('mailReset', array('linkReset'=>$linkReset), function($message) use($user) {
				$message->from('sellPhone@gmail.com', 'Shop SellPhone');
				$message->to($user->email, $user->fullname)->subject('Thay đổi mật khẩu!');
			});

			Session::flash('flash_message', 'Thành công!! Click vào link trong Email để đổi mật khẩu! (Link chỉ có giá trị trong 10 phút)');
			return redirect()->back();

		}
		else {
			return redirect()->back()->withErrors(['exist'=>'Email này chưa là thành viên']);
		}
		
	}
	public function updatePassword(PasswordRequest $request) {
		$data = $request->only('password');
		$data['password'] = bcrypt( $data['password']); //chuan bi mat khau update
		$user_id = Password_reset::Where('token','=',$request->token)->first()->user_id;
		$user = User::find($user_id);
		$user->update($data);
		$dataLogin=['email'=>$user->email, 'password'=>$request->password];
		\Auth::attempt($dataLogin);
		$request->session()->regenerate();
		Session::flash('flash_message', 'Đổi mật khẩu thành công');
		return redirect()->back();
	}
}
