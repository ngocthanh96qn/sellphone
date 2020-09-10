@extends('user.layout.master')
@section ('content')

<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('img/bg-01.jpg') }}');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				
					<span class="login100-form-title p-b-49" style="font-family:'Montserrat';">
						ĐĂNG KÍ
					</span>

					
					
					<form action="{{ route('user.register',$role) }}" method="POST" >
						@method('POST')
						@csrf
						
						<div class="wrap-input100 validate-input m-b-23" >
						<span class="label-input100">Tên của bạn</span> 
						
						<input class="input100" type="text" name="fullname" placeholder="Tên của bạn" value="{{ old('fullname') }}">
						<span class="focus-input100 "  data-symbol="&#xf20e;" ></span>
						@if($errors->has('fullname'))
                  			 <p style="color:red">{{$errors->first('fullname')}}</p>
                   		@endif
					</div>

					<div class="wrap-input100 validate-input m-b-23" >
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Nhập email của bạn" value="{{ old('email') }}">
						<span class="focus-input100 "  data-symbol="&#xf15a;" ></span>
						@if($errors->has('email'))
                  			 <p style="color:red">{{$errors->first('email')}}</p>
                   		@endif
					</div>
					<div class="wrap-input100 validate-input m-b-23" >
						<span class="label-input100">Điện thoại</span>
						<input class="input100" type="text" name="phone" placeholder="Số điện thoại của bạn" value="{{ old('phone') }}">
						<span class="focus-input100 "  data-symbol="&#xf2b6;" ></span>
						@if($errors->has('phone'))
                  			 <p style="color:red">{{$errors->first('phone')}}</p>
                   		@endif
					</div>
					
					<div class="wrap-input100 validate-input m-b-23" >
						<span class="label-input100">Địa chỉ</span>
						<input class="input100" type="text" name="address" placeholder="Địa chỉ của bạn" value="{{ old('address') }}">
						<span class="focus-input100" data-symbol="&#xf1ab;"></span>	 
						@if($errors->has('address'))
                  			 <p style="color:red">{{$errors->first('address')}}</p>
                   		@endif
					</div>
					<div class="wrap-input100 validate-input m-b-23" >
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" type="password" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
						@if($errors->has('password'))
                  			 <p style="color:red">{{$errors->first('password')}}</p>
                   		@endif
						 
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit"  class="login100-form-btn">
								Đăng Kí
							</button>
						</div>
					</div>
                     

					</form>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
@endsection